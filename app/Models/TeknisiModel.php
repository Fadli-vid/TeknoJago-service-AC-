<?php

namespace App\Models;

use CodeIgniter\Model;

class TeknisiModel extends Model
{
    protected $table      = 'teknisi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama_teknisi', 'no_hp', 'alamat', 'keahlian', 'status'];
}
