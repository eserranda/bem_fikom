<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjamanBarang extends Model
{
    protected $table      = 'peminjaman_barang';
    protected $primaryKey = 'id_peminjaman';

    protected $allowedFields = ['nama_peminjam', 'nama_barang', 'tanggal_peminjaman', 'jangka_waktu', 'tanggal_pengembalian', 'keterangan'];
}