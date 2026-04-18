<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['nama_admin', 'password', 'username_admin', 'no_hp_admin', 'role'];

    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
}
