<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanamanherbal', function (Blueprint $table) {
            $table->bigIncrements('idtanamanherbal');
            $table->String('namatanamanherbal');
            $table->String('namalain')->nullable();
            $table->String('gambar');
            $table->String('deskripsi');
            $table->String('klasifikasi');
            $table->String('superkerajaan');
            $table->String('kerajaan');
            $table->String('divisi');
            $table->String('ordo');
            $table->String('famili');
            $table->String('genus');
            $table->String('spesies');
            $table->String('khasiat');
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
        //
    }
}
