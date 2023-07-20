<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelIbadahBulanan extends Model
{
    protected $table      = 'ibadah_bulanan';
    protected $primaryKey = 'id_ibadah';

    protected $allowedFields = ['tanggal_ibadah', 'tempat_ibadah', 'angkatan_pelayan', 'pengeluaran'];
}