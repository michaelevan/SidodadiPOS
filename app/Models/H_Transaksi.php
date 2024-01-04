<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H_Transaksi extends Model
{
    // use HasFactory;
    protected $table = "h_transaksi";
    protected $primaryKey = "kode_h_trans";
    public $timestamps = true;

    protected $fillable =[
        'kode_h_trans',
        'tgl_h_trans',
        'grandtotal',
        'is_active',
    ];
}
