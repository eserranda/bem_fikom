<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKegiatanKerohanian extends Model
{
    protected $table      = 'kegiatan_kerohanian';
    protected $primaryKey = 'id_kegiatan';

    protected $allowedFields = ['nama_kegiatan', 'tempat_kegiatan', 'tanggal_kegiatan', 'pengeluaran_kegiatan', 'pemasukan_kegiatan'];
}