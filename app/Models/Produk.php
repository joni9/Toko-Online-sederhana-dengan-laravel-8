<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    //kode untuk database yang mana tidak boleh dimodifikasi yang lain boleh
    protected $guarded = ['id'];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    
    public function PesananDetail()
    {
        return $this->hasMany(PesananDetail::class, 'produk_id', 'id');
    }
    //fitur pencarian
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama', 'like', '%'. $search.'%');
        });
        $query->when($filters['kategori'] ?? false, function($query, $kategori){
            return $query->whereHas('kategori', function($query) use ($kategori){
                $query->where('id', $kategori);
            });
        });
      
    }

}
