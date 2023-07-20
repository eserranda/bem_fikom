<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataAnggota extends Model
{
    protected $table      = 'anggota_bem';
    protected $primaryKey = 'id_anggota';

    protected $allowedFields = ['stambuk_anggota', 'nama_anggota', 'gender', 'email_anggota', 'nama_angkatan_anggota', 'nomor_hp_anggota', 'status', 'keterangan_anggota', 'foto'];
}