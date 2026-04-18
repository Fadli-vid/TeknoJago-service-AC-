<?php

namespace App\Controllers;
use App\Models\RiwayatModel;
use App\Models\PemesananModel;
use App\Models\TeknisiModel;
use App\Models\M_User;

class User extends BaseController
{
    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
    }

    public function index (){
        return view('Backend/TemplateU/header')
            . view('Backend/TemplateU/sidebar')
            . view('Backend/User/index')
            . view('Backend/TemplateU/footer');
    }
    
    public function userPemesanan()
    {
        $session = session();
        $nama_user = $session->get('nama_user');
        $pemesananModel = new \App\Models\PemesananModel();

        // Ambil pemesanan berdasarkan nama
        $pemesanan = $pemesananModel->where('nama', $nama_user)->findAll();

        return view('Backend/TemplateU/header')
            . view('Backend/TemplateU/sidebar')
            . view('Backend/User/user-pemesanan', ['pemesanan' => $pemesanan])
            . view('Backend/TemplateU/footer');
    }

    public function tambahPemesanan()
    {
        return view('Backend/TemplateU/header')
            . view('Backend/TemplateU/sidebar')
            . view('Backend/User/tambah-pemesanan')
            . view('Backend/TemplateU/footer');
    }

    public function simpanPemesanan()
    {
        $harga = $this->request->getPost('harga');
        // Hilangkan titik ribuan jika ada
        $harga = str_replace('.', '', $harga);

        $data = [
            'user_id' => session()->get('user_id'),
            'layanan' => $this->request->getPost('layanan'),
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'deskripsi_kerusakan' => $this->request->getPost('deskripsi_kerusakan'),
            'status' => 'Menunggu', // Status default
            'created_at' => date('Y-m-d H:i:s'),
            'harga' => $harga // Pastikan harga ikut disimpan
        ];

        if ($this->pemesananModel->save($data)) {
            return redirect()->to('/user/user-pemesanan')->with('success', 'Pemesanan berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat pemesanan');
        }
    }

    public function riwayat()
{
    $session = session();
    $nama_user = $session->get('nama_user');

    $riwayatModel = new RiwayatModel();
    $pemesananModel = new PemesananModel();
    $teknisiModel = new TeknisiModel();

    // Ambil semua pemesanan milik user login
    $pemesananList = $pemesananModel->where('nama', $nama_user)->findAll();
    $pemesananIds = array_column($pemesananList, 'id');

    // Ambil riwayat yang terkait dengan pemesanan user login
    $riwayatList = [];
    if (!empty($pemesananIds)) {
        $riwayatList = $riwayatModel->whereIn('pemesanan_id', $pemesananIds)->findAll();
    }

    // Ubah menjadi array dengan key ID
    $pemesananMap = [];
    foreach ($pemesananList as $p) {
        $pemesananMap[$p['id']] = $p['layanan'];
    }

    $teknisiList = $teknisiModel->findAll();
    $teknisiMap = [];
    foreach ($teknisiList as $t) {
        $teknisiMap[$t['id']] = $t['nama_teknisi'];
    }

    return view('Backend/TemplateU/header')
        . view('Backend/TemplateU/sidebar')
        . view('Backend/User/user-riwayat', [
            'riwayat' => $riwayatList,
            'pemesanan' => $pemesananMap,
            'teknisi' => $teknisiMap,
        ])
        . view('Backend/TemplateU/footer');
}

    public function profil()
    {
        return view('Backend/TemplateU/header')
            . view('Backend/TemplateU/sidebar')
            . view('Backend/User/user-profile')
            . view('Backend/TemplateU/footer');
    }

    public function updatePassword()
{
    $userModel = new M_User();
    $id = session()->get('id_user');
    $newPassword = $this->request->getPost('password_baru');
    $confirmPassword = $this->request->getPost('konfirmasi_password');

    if ($newPassword !== $confirmPassword) {
        return redirect()->back()->with('error', 'Password tidak cocok.');
    }

    $userModel->update($id, [
        'password' => password_hash($newPassword, PASSWORD_DEFAULT)
    ]);

    return redirect()->to('/user/profil')->with('success', 'Password berhasil diubah.');
}

public function invoice($id)
{
    $pemesananModel = new \App\Models\PemesananModel();
    $riwayatModel = new \App\Models\RiwayatModel();
    $teknisiModel = new \App\Models\TeknisiModel();

    $pemesanan = $pemesananModel->find($id);

    // Ambil data riwayat terkait pemesanan ini
    $riwayat = $riwayatModel->where('pemesanan_id', $id)->first();

    // Default
    $nama_teknisi = '-';
    $tanggal_selesai = '-';
    $tanggal_pemesanan = isset($pemesanan['created_at']) ? $pemesanan['created_at'] : '-';

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
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('Backend/User/invoice', [
        'pemesanan' => $pemesanan,
        'nama_teknisi' => $nama_teknisi,
        'tanggal_pemesanan' => $tanggal_pemesanan,
        'tanggal_selesai' => $tanggal_selesai
    ]);
}

}
