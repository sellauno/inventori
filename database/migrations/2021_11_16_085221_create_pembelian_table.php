<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->bigIncrements('id_pembelian');
            $table->date('tgl_pembelian');
            $table->integer('id_barang')->references('id_barang')->on('barang');
            $table->integer('id_aksesoris')->references('id_aksesoris')->on('aksesoris');
            $table->integer('id_produksi')->references('id_produksi')->on('produksi');
            $table->integer('jml_pembelian');
            $table->integer('total_harga')->nullable();
            $table->integer('no_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
