<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aksesoris extends Model
{
    public $primaryKey  = 'id_aksesoris';
    protected $fillable = ['nama_aksesoris','harga'];
}
