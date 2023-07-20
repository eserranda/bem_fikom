<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelIuaranPengurus extends Model
{

    protected $table            = 'iuran_pengurus';
    protected $primaryKey       = 'id_iuran';
    protected $allowedFields    = ['nama', 'jumlah_uang', 'bulan', 'keterangan', 'denda'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}