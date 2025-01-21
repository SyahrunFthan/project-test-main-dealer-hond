<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'product_id',
        'user_id',
        'total',
        'total_harga',
        'tanggal'
    ];

    public $incrementing = true;
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id_product');
    }
}
