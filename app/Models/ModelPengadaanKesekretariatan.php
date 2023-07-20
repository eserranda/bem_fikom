<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengadaanKesekretariatan extends Model
{
    protected $table      = 'pengadaan_keseks';
    protected $primaryKey = 'id_pengadaan_keseks';

    protected $allowedFields = ['jenis', 'nama', 'jumlah', 'tanggal', 'keterangan'];
}