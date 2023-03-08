<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    //kode untuk database yang mana tidak boleh dimodifikasi yang lain boleh
    protected $guarded = ['id'];

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

    public function Pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
