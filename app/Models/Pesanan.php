<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    //kode untuk database yang mana tidak boleh dimodifikasi yang lain boleh
    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function PesananDetail()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }
    //filter pesanan
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('tanggal', 'like', '%'. $search.'%')
            ->orWhere('kode_pesanan', 'like', '%'. $search.'%')
            ->orWhere('total_harga', 'like', '%'. $search.'%');
        });
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->whereHas('User', fn($query) =>
                $query->where('name', $search)
        ));      
    }

}
