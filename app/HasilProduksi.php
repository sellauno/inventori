<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilProduksi extends Model
{
    public $primaryKey  = 'id_produksi';
    public $table = 'hasilproduksi';
    protected $fillable = ['id_order', 'id_barang', 'first_qty', 'qty', 'reject_qty'];

}
