<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    public $primaryKey  = 'id_pembelian';
    public $table = 'pembelian';
    protected $fillable = ['tgl_pembelian','id_produksi','id_barang','id_aksesoris','jml_pembelian','total_harga','no_pembelian'];
}
