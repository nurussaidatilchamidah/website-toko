<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Untuk SQLite, kita perlu pendekatan khusus
        // Karena SQLite tidak mendukung ALTER COLUMN
        
        // 1. Buat tabel sementara dengan struktur yang sama tapi kolom gambar_barang sebagai TEXT
        Schema::create('stoks_temp', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barcode');
            $table->string('nama_barang');
            $table->text('gambar_barang')->nullable(); // Gunakan TEXT untuk JSON
            $table->integer('stok');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
            // Tambahkan kolom lain yang ada di tabel stoks
        });
        
        // 2. Salin data dengan konversi nilai gambar_barang ke format JSON/array
        DB::statement("INSERT INTO stoks_temp (id, kode_barcode, nama_barang, gambar_barang, stok, harga, created_at, updated_at)
                     SELECT id, kode_barcode, nama_barang, 
                     CASE WHEN gambar_barang IS NOT NULL THEN json_array(gambar_barang) ELSE NULL END,
                     stok, harga, created_at, updated_at FROM stoks");
                     
        // 3. Drop tabel lama
        Schema::drop('stoks');
        
        // 4. Rename tabel baru menjadi stoks
        Schema::rename('stoks_temp', 'stoks');
    }

    public function down()
    {
        // Implementasi down migration jika diperlukan
    }
};