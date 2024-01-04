<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakturPembelian extends Model
{
    // use HasFactory;
    protected $table = "faktur_pembelian";
    protected $primaryKey = "no_faktur";
    public $timestamps = false;

    protected $fillable =[
        'no_faktur',
        'tanggal',
        'tipe_bayar',
        'ppn',
        'nama_barang',
        'jumlah',
        'harga',
        'disc1',
        'disc2',
        'disc3',
        'disc4',
        'grandtotal',
        'is_active',
    ];
}
