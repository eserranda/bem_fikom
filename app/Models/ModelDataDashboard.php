<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataDashboard extends Model
{
    // protected $table = 'nama_angkatan';


    function datapengurus()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_pengurus');
        return $builder->countAllResults();
    }

    function dataanggota()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('anggota_bem');
        return $builder->countAllResults();
    }

    function dataalumni()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_alumni');
        return $builder->countAllResults();
    }

    function dipecat()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('anggota_bem');
        $builder->where('status', 'dipecat');
        return $builder->countAllResults();

        // return $this->table('data')->where('identification', $cari);
    }
}