<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataBendahara extends Model
{
    protected $table            = 'bendahara';
    protected $primaryKey       = 'id_bendahara';

    protected $allowedFields    = ['keterangan', 'debet', 'kredit', 'saldo', 'tanda_terima'];
}