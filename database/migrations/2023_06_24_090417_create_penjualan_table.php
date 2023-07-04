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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('nomor_faktur')->primary();
            $table->integer('biaya_pengiriman');
            $table->integer('dpp');
            $table->integer('ppn');
            $table->bigInteger('total');
            $table->date('tanggal_penjualan');
            $table->enum('sumber_transaksi', ['POS', 'MARKETPLACE']);
            $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar', 'Dikirim', 'Selesai']);
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
        Schema::dropIfExists('penjualan');
    }
};
