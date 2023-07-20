<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataPengurus extends Model
{
    protected $table      = 'data_pengurus';
    protected $primaryKey = 'id_pengurus';

    protected $allowedFields = ['stambuk', 'nama', 'jabatan'];
}