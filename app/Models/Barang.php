<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // use HasFactory;
    protected $table = "barang";
    protected $primaryKey = "kode_barang";
    public $timestamps = true;

    protected $fillable =[
        'kode_barang',
        'fk_supplier',
        'satuan',
        'nama_barang',
        'jumlah_barang',
        'min_stok',
        'harga_pokok',
        'harga_jual',
        'tgl_exp',
        'deskripsi_barang',
        'diskon',
        'img',
        'is_active',
    ];
}
