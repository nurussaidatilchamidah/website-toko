<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';

    protected $fillable = [
        'tanggal_transaksi',
        'kode_barcode',
        'nama_produk',
        'jumlah',
        'harga',
        'pembayaran',
        'sisa_stok',
    ];
}
