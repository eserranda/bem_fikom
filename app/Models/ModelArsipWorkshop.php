<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelArsipWorkshop extends Model
{
    protected $table      = 'arsip_workshop';
    protected $primaryKey = 'id_arsip';

    protected $allowedFields = ['nama_arsip', 'kondisi_arsip', 'keterangan_arsip'];
}