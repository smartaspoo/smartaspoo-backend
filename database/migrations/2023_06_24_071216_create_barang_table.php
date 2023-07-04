<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string("kode_barang")->primary();
            $table->string("nama_barang");
            $table->integer("harga_barang_jual");
            $table->integer("harga_barang_beli");
            $table->bigInteger("stock_global");

            $table->unsignedBigInteger("kode_umkm");
            // $table->bigInteger("satuan_id");
            // $table->bigInteger("kategori_barang_id");

            // $table->foreign("satuan_id")->references("id")->on("satuan");
            // $table->foreign("kategori_barang_id")->references("id")->on("kategori_barang");
            $table->foreign("kode_umkm")->references("id")->on("users");

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
        Schema::dropIfExists('barang');
    }
};
