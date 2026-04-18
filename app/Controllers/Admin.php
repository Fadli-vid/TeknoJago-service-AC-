<?php

namespace App\Controllers;
use App\Models\RiwayatModel;
use App\Models\PemesananModel;
use App\Models\TeknisiModel;
use App\Models\M_User;
use App\Models\AdminModel;

class Admin extends BaseController
{
    public function index()
{
    $teknisiModel = new TeknisiModel();
    $pemesananModel = new PemesananModel();
    $riwayatModel = new RiwayatModel();
    $db = \Config\Database::connect();

    $jumlahTeknisi = $teknisiModel->countAll();
    $jumlahPelanggan = $db->table('users')->where('role', 'user')->countAllResults();
    $pemesananHariIni = $pemesananModel
        ->where('DATE(created_at)', date('Y-m-d'))
        ->where('LOWER(status) !=', 'selesai')
        ->countAllResults();
    $riwayatSelesai = $riwayatModel->where('status', 'Selesai')->countAllResults();

    $data = [
        'jumlahTeknisi' => $jumlahTeknisi,
        'jumlahPelanggan' => $jumlahPelanggan,
        'pemesananHariIni' => $pemesananHariIni,
        'riwayatSelesai' => $riwayatSelesai,
    ];

    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/admin', $data)
        . view('Backend/Template/footer');
}

public function Dashboard()
{
    return view('Backend/Admin/dashboard');
}


    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
    }

    public function admin (){
        return view('Backend/TemplateU/header')
            . view('Backend/TemplateU/sidebar')
            . view('Backend/admin/index')
            . view('Backend/TemplateU/footer');
    }
    
    public function pemesanan()
    {
        $pemesanan = $this->pemesananModel
            ->where('LOWER(status) !=', 'selesai')
            ->findAll();
        return view('Backend/Template/header')
            . view('Backend/Template/sidebar')
            . view('Backend/admin/admin-pemesanan', ['pemesanan' => $pemesanan])
            . view('Backend/Template/footer');
    }

    public function tambahPesan()
    {
        $userModel = new \App\Models\M_User();
        $users = $userModel->findAll();
        return view('Backend/Admin/tambah-pesan', [
            'users' => $users
        ])
            . view('Backend/Template/header')
            . view('Backend/Template/sidebar')
            . view('Backend/Template/footer');
    }

    public function simpanPesan()
    {
        $data = [
            'user_id' => session()->get('user_id'),
            'layanan' => $this->request->getPost('layanan'),
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'deskripsi_kerusakan' => $this->request->getPost('deskripsi_kerusakan'),
            'harga' => $this->request->getPost('harga'), // Tambahkan harga
            'status' => 'Menunggu', // Status default
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->pemesananModel->save($data)) {
            return redirect()->to('/admin/pemesanan')->with('success', 'Pemesanan berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat pemesanan');
        }
    }

    public function terimaPemesanan($id)
{
    $pemesananModel = new PemesananModel(); // Model untuk pemesanan
    $riwayatModel = new RiwayatModel(); // Model untuk riwayat

    // Ambil data pemesanan dengan menggunakan ID yang benar
    $pemesanan = $pemesananModel->find($id);
    
    if (!$pemesanan) {
        // Menangani jika tidak ditemukan data pemesanan
        return redirect()->back()->with('error', 'Pemesanan tidak ditemukan');
    }

    // Pindahkan data ke tabel riwayat
    $riwayatModel->insert([
        'pemesanan_id' => $pemesanan['id'], // Pastikan ini adalah kolom ID pemesanan
        'teknisi_id' => null, // Kosongkan teknisi karena akan diisi manual
        'status' => 'Menunggu Teknisi', // Status pemesanan diubah ke "Menunggu Teknisi"
        'waktu_masuk' => $pemesanan['created_at'], // Waktu pemesanan masuk
        'waktu_selesai' => null, // Waktu selesai kosongkan
    ]);

    // Update status di tabel pemesanan
    $pemesananModel->update($id, ['status' => 'Menunggu Teknisi']);
    
    // Redirect ke halaman pemesanan setelah proses selesai
    return redirect()->to('/admin/pemesanan');
}




    public function ubahPemesanan($id)
    {
        $pemesananModel = new PemesananModel();
        $teknisiModel = new TeknisiModel();

        $pemesanan = $pemesananModel->find($id);
        $teknisi = $teknisiModel->findAll();

        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }

        return view('Backend/Template/header')
            . view('Backend/Template/sidebar')
            . view('Backend/Admin/ubah-pemesanan', [
                'pemesanan' => $pemesanan,
                'teknisi' => $teknisi
            ])
            . view('Backend/Template/footer');
    }

    public function updatePemesanan($id)
    {
        $pemesananModel = new PemesananModel();
        $riwayatModel = new RiwayatModel();
        $teknisiModel = new TeknisiModel();

        $teknisi_id = $this->request->getPost('teknisi_id');
        $status = $this->request->getPost('status');
        $waktu_keluar = $this->request->getPost('waktu_keluar');
        $harga = $this->request->getPost('harga'); // Ambil harga dari input

        // Ambil nama teknisi dari tabel teknisi
        $nama_teknisi = null;
        if ($teknisi_id) {
            $teknisi = $teknisiModel->find($teknisi_id);
            $nama_teknisi = $teknisi ? $teknisi['nama_teknisi'] : null;
        }

        // Update pemesanan
        $pemesananModel->update($id, [
            'teknisi_id' => $teknisi_id,
            'status' => $status,
            'waktu_keluar' => $waktu_keluar,
            'harga' => $harga, // Update harga
        ]);

        // Update riwayat jika ada
        $riwayat = $riwayatModel->where('pemesanan_id', $id)->first();
        if ($riwayat) {
            $riwayatData = [
                'teknisi_id' => $teknisi_id,
                'status' => $status,
            ];
            // Jika status selesai, update waktu_selesai di riwayat
            if ($status === 'Selesai') {
                $riwayatData['waktu_selesai'] = $waktu_keluar;
            }
            $riwayatModel->update($riwayat['id'], $riwayatData);
        }

        return redirect()->to('/admin/pemesanan')->with('success', 'Pemesanan & riwayat berhasil diupdate.');
    }

    public function hapusPemesanan($id)
{
    $pemesananModel = new PemesananModel();

    // Cek apakah data pemesanan ada
    $pemesanan = $pemesananModel->find($id);
    if (!$pemesanan) {
        return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
    }

    $pemesananModel->delete($id);
    return redirect()->to('/admin/pemesanan')->with('success', 'Pemesanan berhasil dihapus.');
}


    public function riwayat()
{
    $db = \Config\Database::connect();
    $builder = $db->table('riwayat');
    $builder->select('
        riwayat.id,
        riwayat.pemesanan_id,
        pemesanan.layanan,
        teknisi.nama_teknisi,
        riwayat.status,
        pemesanan.nama_barang,
        riwayat.waktu_masuk,
        riwayat.waktu_selesai
    ');
    $builder->join('pemesanan', 'pemesanan.id = riwayat.pemesanan_id');
    $builder->join('teknisi', 'teknisi.id = riwayat.teknisi_id', 'left');
    $query = $builder->get();
    $data['riwayat'] = $query->getResult(); // result as object

    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/admin-riwayat', $data)
        . view('Backend/Template/footer');
}


    



public function tambahRiwayat()
{
    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/tambah-riwayat')
        . view('Backend/Template/footer');
}

public function simpanRiwayat()
{
    $model = new RiwayatModel();
    $model->insert([
        'pemesanan_id' => $this->request->getPost('pemesanan_id'),
        'teknisi_id' => $this->request->getPost('teknisi_id'),
        'status' => $this->request->getPost('status'),
        'waktu_masuk' => $this->request->getPost('waktu_masuk'),
        'waktu_selesai' => $this->request->getPost('waktu_selesai'),
    ]);
    return redirect()->to('admin/riwayat');
}

public function editRiwayat($id)
{
    $riwayatModel = new RiwayatModel();
    $teknisiModel = new TeknisiModel(); // Ambil model teknisi
    $data['riwayat'] = $riwayatModel->find($id);
    $data['teknisi'] = $teknisiModel->findAll(); // Ambil semua teknisi
    
    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/ubah-riwayat', $data)
        . view('Backend/Template/footer');
}


public function updateRiwayat($id)
{
    $riwayatModel = new RiwayatModel();
    $pemesananModel = new PemesananModel();

    // Ambil data riwayat dulu buat dapetin pemesanan_id
    $riwayat = $riwayatModel->find($id);

    $teknisi_id = $this->request->getPost('teknisi_id');
    $status = $this->request->getPost('status');
    $waktu_masuk = $this->request->getPost('waktu_masuk');
    $waktu_selesai = $this->request->getPost('waktu_selesai');
    $waktu_keluar = $this->request->getPost('waktu_keluar');

    // Update data di tabel riwayat
    $riwayatModel->update($id, [
        'teknisi_id' => $teknisi_id,
        'status' => $status,
        'waktu_masuk' => $waktu_masuk,
        'waktu_selesai' => $waktu_selesai,
    ]);

    // Update juga di pemesanan
    $updatePemesanan = [
        'teknisi_id' => $teknisi_id,
        'status' => $status,
    ];
    // Jika status selesai, update waktu_keluar di pemesanan
    if ($status == 'Selesai' && $waktu_selesai) {
        $updatePemesanan['waktu_keluar'] = $waktu_selesai;
    }
    $pemesananModel->update($riwayat['pemesanan_id'], $updatePemesanan);

    return redirect()->to('admin/riwayat');
}



public function hapusRiwayat($id)
{
    $model = new RiwayatModel();
    $model->delete($id);
    return redirect()->to('admin/riwayat');
}

    public function teknisi()
{
    $model = new TeknisiModel();
    $data['teknisi'] = $model->findAll();

    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/admin-datateknisi', $data)
        . view('Backend/Template/footer');
}

public function tambahTeknisi()
{
    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/tambah-teknisi')
        . view('Backend/Template/footer');
}

public function simpanTeknisi()
{
    $model = new TeknisiModel();

    $data = [
        'nama_teknisi' => $this->request->getPost('nama'),
        'no_hp'        => $this->request->getPost('no_hp'),
        'alamat'       => $this->request->getPost('alamat'),
        'keahlian'     => $this->request->getPost('keahlian'),
        'username'     => $this->request->getPost('username'),
        'password'     => $this->request->getPost('password'),
    ];

    $model->insert($data);
    return redirect()->to(site_url('admin/teknisi'))->with('success', 'Teknisi berhasil ditambahkan.');
}


public function editTeknisi($id)
{
    $model = new TeknisiModel();
    $data['teknisi'] = $model->find($id);

    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/edit-datateknisi', $data)
        . view('Backend/Template/footer');
}

public function updateTeknisi($id)
{
    $model = new TeknisiModel();
    $model->update($id, [
        'nama' => $this->request->getPost('nama_teknisi'),
        'no_hp' => $this->request->getPost('no_hp'),
        'alamat' => $this->request->getPost('alamat'),
        'keahlian' => $this->request->getPost('keahlian'),
    ]);
    return redirect()->to(site_url('admin/teknisi'));
}

public function hapusTeknisi($id)
{
    $model = new TeknisiModel();
    $model->delete($id);
    return redirect()->to(site_url('admin/teknisi'));
}

public function dataCustomer()
{
    $model = new M_User();
    $data['customer'] = $model->where('role', 'user')->findAll(); // asumsi role = 'user' untuk customer
    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/data-customer', $data)
        . view('Backend/Template/footer');
}
    
    public function editUser($id)
    {
        $userModel = new M_User();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('admin/data-customer')->with('error', 'User tidak ditemukan.');
        }

        return view('Backend/Template/header')
            . view('Backend/Template/sidebar')
            . view('Backend/Admin/edit-user', ['user' => $user])
            . view('Backend/Template/footer');
    }

    public function updateUser($id)
    {
        $userModel = new \App\Models\M_User();
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username'  => $this->request->getPost('username'),
            'alamat'    => $this->request->getPost('alamat'),
            'no_telp'   => $this->request->getPost('no_telp'),
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $userModel->update($id, $data);

        return redirect()->to('admin/data-customer')->with('success', 'Data user berhasil diupdate.');
    }

    public function dataAdmin()
{
    $adminModel = new AdminModel();
    $data['admin'] = $adminModel->findAll();

    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/admin-dataadmin', $data)
        . view('Backend/Template/footer');
}

public function tambahAdmin()
{
    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/tambah-admin')
        . view('Backend/Template/footer');
}

public function simpanAdmin()
{
    $adminModel = new AdminModel();
    $randomId = random_int(100000, 999999); // Angka random 6 digit, sesuaikan range sesuai kebutuhan

    $data = [
        'id_admin' => $randomId,
        'nama_admin' => $this->request->getPost('nama_admin'),
        'username_admin' => $this->request->getPost('username_admin'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'no_hp_admin' => $this->request->getPost('no_hp_admin'),
        'role' => $this->request->getPost('role'),
    ];
    $adminModel->insert($data);
    return redirect()->to('admin/data-admin')->with('success', 'Admin berhasil ditambahkan.');
}

public function editAdmin($id)
{
    $adminModel = new AdminModel();
    $data['admin'] = $adminModel->find($id);

    return view('Backend/Template/header')
        . view('Backend/Template/sidebar')
        . view('Backend/Admin/edit-admin', $data)
        . view('Backend/Template/footer');
}

public function updateAdmin($id)
{
    $adminModel = new AdminModel();
    $data = [
        'nama_admin' => $this->request->getPost('nama_admin'),
        'username_admin' => $this->request->getPost('username_admin'),
        'no_hp_admin' => $this->request->getPost('no_hp_admin'),
        'role' => $this->request->getPost('role'),
    ];
    $password = $this->request->getPost('password');
    if (!empty($password)) {
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
    $adminModel->update($id, $data);
    return redirect()->to('admin/data-admin')->with('success', 'Data admin berhasil diupdate.');
}

public function hapusAdmin($id)
{
    $adminModel = new AdminModel();
    $adminModel->delete($id);
    return redirect()->to('admin/data-admin')->with('success', 'Data admin berhasil dihapus.');
}

    public function hapusUser($id)
    {
        $userModel = new \App\Models\M_User();
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->to('admin/data-customer')->with('error', 'User tidak ditemukan.');
        }
        $userModel->delete($id);
        return redirect()->to('admin/data-customer')->with('success', 'User berhasil dihapus.');
    }

    public function invoice($id)
    {
        $pemesananModel = new PemesananModel();
        $riwayatModel = new RiwayatModel();
        $teknisiModel = new TeknisiModel();

        $pemesanan = $pemesananModel->find($id);

        // Ambil data riwayat terkait pemesanan ini
        $riwayat = $riwayatModel->where('pemesanan_id', $id)->first();

        // Default
        $nama_teknisi = '-';
        $tanggal_selesai = '-';

        if ($riwayat) {
            // Ambil nama teknisi jika ada
            if (!empty($riwayat['teknisi_id'])) {
                $teknisi = $teknisiModel->find($riwayat['teknisi_id']);
                $nama_teknisi = $teknisi ? $teknisi['nama_teknisi'] : '-';
            }
            // Ambil tanggal selesai jika ada
            if (!empty($riwayat['waktu_selesai'])) {
                $tanggal_selesai = $riwayat['waktu_selesai'];
            }
        }

        if (!$pemesanan) {
            return redirect()->to('/admin/pemesanan')->with('error', 'Data pemesanan tidak ditemukan.');
        }

        return view('Backend/Admin/invoice', [
            'pemesanan' => $pemesanan,
            'nama_teknisi' => $nama_teknisi,
            'tanggal_selesai' => $tanggal_selesai
        ]);
    }

}
