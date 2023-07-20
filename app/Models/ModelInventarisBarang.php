<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInventarisBarang extends Model
{
    protected $table      = 'inventaris_barang';
    protected $primaryKey = 'id_inventaris';

    protected $allowedFields = ['jenis_barang', 'nama_barang', 'jumlah_barang', 'barang_rusak', 'kondisi_baru', 'kondisi_lama', 'status', 'keterangan_barang'];

    function search($cari)
    {
        return $this->table('inventaris_barang')->like('nama_barang', $cari);
    }
}