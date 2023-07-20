<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataArsip extends Model
{
    protected $table      = 'arsip_bem';
    protected $primaryKey = 'id_arsip';

    protected $allowedFields = ['nama_arsip', 'kondisi_arsip', 'keterangan_arsip'];
}