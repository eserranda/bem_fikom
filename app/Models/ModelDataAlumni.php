<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataAlumni extends Model
{
    protected $table      = 'data_alumni';
    protected $primaryKey = 'id_alumni';

    protected $allowedFields = ['stambuk_alumni', 'nama', 'gender', 'email', 'nama_angkatan', 'alumni_tahun', 'nomor_hp', 'foto'];
}