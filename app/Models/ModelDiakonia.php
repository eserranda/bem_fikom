<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDiakonia extends Model
{
    protected $table      = 'diakonia';
    protected $primaryKey = 'id_diakonia';

    protected $allowedFields = ['nama_kunjungan', 'tanggal_kunjungan', 'tempat_kunjungan', 'pengeluaran_kunjungan', 'keterangan_kunjungan'];
}