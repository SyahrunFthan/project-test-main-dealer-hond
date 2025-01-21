<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $fillable = ['nama_product','harga_product','stok','foto_product','deskripsi','kategori_id'];

    public $incrementing = true;
    public $timestamps = true;

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
