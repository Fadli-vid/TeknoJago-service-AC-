<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'nama_user', 'role', 'alamat', 'no_telp'];

    protected $useTimestamps = false;
    protected $useSoftDeletes = false; 
}
