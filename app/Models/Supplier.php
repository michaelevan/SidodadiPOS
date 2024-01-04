<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // use HasFactory;
    protected $table = "supplier";
    protected $primaryKey = "kode_supplier";
    public $timestamps = false;

    protected $fillable =[
        'kode_supplier',
        'nama_supplier',
        'alamat_supplier',
        'kota',
        'no_telp',
        'NPWP',
        'nama_bank',
        'no_rekening',
        'nama_pajak',
        'alamat_pajak',
        'is_active',
    ];
}
