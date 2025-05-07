<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi');
            $table->string('kode_barcode');
            $table->string('nama_produk');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('pembayaran');
            $table->integer('sisa_stok');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
