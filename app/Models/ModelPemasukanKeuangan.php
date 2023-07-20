<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPemasukanKeuangan extends Model
{
    protected $table            = 'pemasukan_keuangan';
    protected $primaryKey       = 'id_pemasukan ';

    protected $allowedFields    = ['sumber_pemasukan', 'keterangan_pemasukan', 'tanggal_pemasukan', 'jumlah_pemasukan'];
}