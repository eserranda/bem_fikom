<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKegiatanHumas extends Model
{
    protected $table      = 'kegiatan_humas';
    protected $primaryKey = 'id_kegiatan';

    protected $allowedFields = ['nama_kegiatan', 'jenis_kegiatan', 'tempat_kegiatan', 'tanggal_kegiatan'];
}