<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDanaKreatifKeuangan extends Model
{
    protected $table            = 'dana_kreatif_keuangan';
    protected $primaryKey       = 'id_kreatif';

    protected $allowedFields    = ['nama_basar', 'tanggal_basar', 'hutang', 'pendapatan', 'pelanggan'];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}