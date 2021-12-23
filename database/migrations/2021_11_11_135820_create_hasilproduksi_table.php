<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilproduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasilproduksi', function (Blueprint $table) {
            $table->bigIncrements('id_produksi');
            $table->integer('id_order')->references('id_order')->on('order');
            $table->integer('id_barang')->references('id_barang')->on('barang');
            $table->integer('first_qty');
            $table->integer('qty')->nullable();
            $table->integer('reject_qty')->nullable();
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
        Schema::dropIfExists('hasilproduksi');
    }
}
