<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 'username', 'jabatan', 'email', 'fullname', 'user_image', 'nickname', 'gender', 'phone_number', 'tempat_lahir', 'tanggal_lahir', 'nama_angkatan', 'tahun_masuk', 'address', 'quote', 'instagram', 'tiktok', 'facebook'];


    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    function ketua()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Ketua']);
        return $query;
    }

    function bendahara()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Bendahara']);
        return $query;
    }

    function sekretaris()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Sekretaris']);
        return $query;
    }

    function Koor_keseks()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Koordinator Kesekretariatan']);
        return $query;
    }

    function Koor_kader()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Koordinator Kaderisasi']);
        return $query;
    }

    function Koor_humas()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Koordinator Humas']);
        return $query;
    }

    function Koor_keilmuan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Koordinator Keilmuan']);
        return $query;
    }

    function Koor_kerohanian()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Koordinator Kerohanian']);
        return $query;
    }

    function Koor_keuangan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Koordinator Keuangan']);
        return $query;
    }

    function anggota_kader()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Anggota Kaderisasi']);
        return $query;
    }

    function anggota_humas()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Anggota Humas']);
        return $query;
    }
    function anggota_keilmuan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Anggota Keilmuan']);
        return $query;
    }

    function anggota_kerohanian()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Anggota Kerohanian']);
        return $query;
    }
    function anggota_keuangan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Anggota Keuangan']);
        return $query;
    }

    function anggota_keseks()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['jabatan' => 'Anggota Kesekretariatan']);
        return $query;
    }
}