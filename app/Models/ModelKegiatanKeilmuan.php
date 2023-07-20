<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKegiatanKeilmuan extends Model
{
    protected $table      = 'kegiatan_keilmuan';
    protected $primaryKey = 'id_kegiatan';

    protected $allowedFields = ['nama_kegiatan', 'jenis_kegiatan', 'tempat_kegiatan', 'tanggal_kegiatan', 'tanggal_selesai'];
}