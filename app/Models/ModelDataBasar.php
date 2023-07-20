<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataBasar extends Model
{
    protected $table            = 'basar_bulanan';
    protected $primaryKey       = 'id_basar';

    protected $allowedFields    = ['jenis_basar', 'tanggal_basar', 'tempat_basar', 'pendapatan_basar'];
}