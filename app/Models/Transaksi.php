<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // use HasFactory;
    protected $table = "transaksi";
    protected $primaryKey = "kode_trans";
    public $timestamps = false;

    protected $fillable =[
        'kode_h_trans',
        'tanggal_exp',
        'kode_barang ',
        'kode_supplier ',
        'nama_barang',
        'jumlah',
        'harga',
        'disc1',
        'disc2',
        'disc3',
        'disc4',
        'subtotal',
        'is_active'
    ];
}
