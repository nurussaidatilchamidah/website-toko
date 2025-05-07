<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stoks';

    protected $fillable = [
        'kode_barcode',
        'nama_barang',
        'gambar_barang',
        'stok',
        'harga',
    ];

    // Ini penting - Filament v3 membutuhkan ini
    protected $casts = [
        'gambar_barang' => 'array',
    ];

    public function penjualans(): HasMany
    {
        return $this->hasMany(Penjualan::class);
    }
}