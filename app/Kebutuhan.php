<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    public $primaryKey  = 'id_kebutuhan';
    public $table = 'kebutuhan';
    protected $fillable = ['id_barang','id_aksesoris','jumlah'];
}
