<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pemesanan_id', 'teknisi_id', 'status', 'waktu_masuk', 'waktu_selesai'
    ];
    protected $useTimestamps = false;
}
