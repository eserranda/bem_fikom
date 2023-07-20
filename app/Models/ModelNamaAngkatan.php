<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNamaAngkatan extends Model
{
    protected $table      = 'nama_angkatan';
    protected $primaryKey = 'id_namaangkatan';

    protected $allowedFields = ['tahun', 'nama', 'logo'];
}