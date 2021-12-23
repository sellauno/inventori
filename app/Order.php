<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $primaryKey  = 'id_order';
    public $table = 'order';
    protected $fillable = ['kode_order','tgl', 'keterangan'];
}
