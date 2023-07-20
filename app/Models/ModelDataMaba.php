<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataMaba extends Model
{
    protected $table      = 'maba';
    protected $primaryKey = 'id_maba';

    protected $allowedFields = ['stambuk_maba', 'nama_maba', 'nama_panggilan_maba', 'tempat_lahir_maba', 'tanggal_lahir_maba', 'tahun_tamat', 'gender', 'alamat_asal', 'asal_sekolah', 'jurusan', 'hobby', 'nama_ayah', 'nama_ibu', 'email_maba', 'nomor_hp_maba', 'alamat', 'pengalaman_organisasi', 'instagram', 'tiktok', 'facebook', 'alasan', 'foto'];
}