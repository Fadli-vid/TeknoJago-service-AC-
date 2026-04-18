<?php

namespace App\Controllers;
use App\Models\RiwayatModel;
use App\Models\PemesananModel;
use App\Models\TeknisiModel;

class Teknisi extends BaseController
{
    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
{
    $pemesananModel = new PemesananModel();
    $riwayatModel = new RiwayatModel();
    $db = \Config\Database::connect();

    $jumlahPelanggan = $db->table('users')->where('role', 'user')->countAllResults();

    // Ambil id teknisi yang sedang login
    $id_teknisi = session()->get('id_teknisi');

    // Hitung pemesanan hari ini milik teknisi yang login dan status-nya bukan 'Selesai'
    $pemesananHariIni = $pemesananModel
        ->where('DATE(created_at)', date('Y-m-d'))
        ->where('LOWER(status) !=', 'selesai')
        ->where('teknisi_id', $id_teknisi)
        ->countAllResults();

    // Hanya hitung riwayat selesai milik teknisi yang login
    $riwayatSelesai = $riwayatModel
        ->where('status', 'Selesai')
        ->where('teknisi_id', $id_teknisi)
        ->countAllResults();

    $data = [
        
        'jumlahPelanggan' => $jumlahPelanggan,
        'pemesananHariIni' => $pemesananHariIni,
        'riwayatSelesai' => $riwayatSelesai,
    ];

    return view('Backend/TemplateT/header')
        . view('Backend/TemplateT/sidebar')
        . view('Backend/Teknisi/index', $data)
        . view('Backend/TemplateT/footer');
}

    public function pemesanan()
    {
        // Ambil id teknisi yang sedang login dari session
        $id_teknisi = session()->get('id_teknisi');
        if (!$id_teknisi) {
            return redirect()->back()->with('error', 'Anda belum login sebagai teknisi.');
        }

        // Ambil hanya pemesanan yang status-nya bukan 'Selesai' dan teknisi_id = teknisi yang login
        $pemesanan = $this->pemesananModel
            ->where('LOWER(status) !=', 'selesai')
            ->where('teknisi_id', $id_teknisi)
            ->findAll();

        $teknisiModel = new \App\Models\TeknisiModel();
        $teknisiList = $teknisiModel->findAll();
        $teknisiMap = [];
        foreach ($teknisiList as $t) {
            $teknisiMap[$t['id']] = $t['nama_teknisi'];
        }
        return view('Backend/TemplateT/header')
            . view('Backend/TemplateT/sidebar')
            . view('Backend/Teknisi/teknisi-pemesanan', [
                'pemesanan' => $pemesanan,
                'teknisiMap' => $teknisiMap
            ])
            . view('Backend/TemplateT/footer');
            }

    public function riwayat()
    {
        $id_teknisi = session()->get('id_teknisi');
        if (!$id_teknisi) {
            return redirect()->back()->with('error', 'Anda belum login sebagai teknisi.');
        }

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
        $builder->where('riwayat.teknisi_id', $id_teknisi); // hanya riwayat teknisi login
        $query = $builder->get();
        $data['riwayat'] = $query->getResult();

        return view('Backend/TemplateT/header')
            . view('Backend/TemplateT/sidebar')
            . view('Backend/Teknisi/teknisi-riwayat', $data)
            . view('Backend/TemplateT/footer');
    }

    public function dataCustomer()
    {
        // Cek role
        if (session()->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda bukan admin');
        }

        $model = new \App\Models\M_User();
        $data['customer'] = $model->where('role', 'user')->findAll();

        return view('Backend/TemplateT/header')
            . view('Backend/TemplateT/sidebar')
            . view('Backend/Admin/data-customer', $data) // bisa pakai view admin
            . view('Backend/TemplateT/footer');
    }

    public function teknisiData()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda bukan admin');
        }

        $model = new TeknisiModel();
        $data['teknisi'] = $model->findAll();

        return view('Backend/TemplateT/header')
            . view('Backend/TemplateT/sidebar')
            . view('Backend/Admin/admin-datateknisi', $data)
            . view('Backend/TemplateT/footer');
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
            return redirect()->to('/teknisi/pemesanan')->with('error', 'Data pemesanan tidak ditemukan.');
        }

        return view('Backend/Teknisi/invoice', [
            'pemesanan' => $pemesanan,
            'nama_teknisi' => $nama_teknisi,
            'tanggal_selesai' => $tanggal_selesai
        ]);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        if (!$status) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        // Update status pemesanan
        $this->pemesananModel->update($id, ['status' => $status]);

        // Jika status menjadi "Proses", set waktu mulai kerja (opsional)
        // Jika status menjadi "Menunggu Pembayaran", set waktu_keluar (opsional)

        return redirect()->back()->with('success', 'Status pemesanan berhasil diubah.');
    }
}
