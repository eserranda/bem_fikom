<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInventarisWorkshop extends Model
{
    protected $table      = 'inventaris_workshop';
    protected $primaryKey = 'id_workshop';

    protected $allowedFields = ['jenis_barang', 'nama_barang', 'jumlah_barang', 'barang_rusak', 'kondisi_baru', 'kondisi_lama', 'status', 'keterangan_barang'];
}