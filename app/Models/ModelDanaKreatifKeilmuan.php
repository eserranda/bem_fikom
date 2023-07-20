<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDanaKreatifKeilmuan extends Model
{
    protected $table      = 'danakreatif_keilmuan';
    protected $primaryKey = 'id_danakreatif';
    // protected $returnType = 'array';

    protected $allowedFields = ['nama_danakreatif', 'nama_cs', 'tanggal_danakreatif', 'pendapatan_danakreatif', 'keterangan_danakeratif'];
}