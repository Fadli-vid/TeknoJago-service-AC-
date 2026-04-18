<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'layanan', 'nama', 'no_hp', 'alamat',
        'nama_barang', 'deskripsi_kerusakan', 'status', 'created_at', 'harga', 'teknisi_id', 'name_teknisi'
    ];
}


