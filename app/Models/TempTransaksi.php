<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTransaksi extends Model
{
    use HasFactory;

    protected $table = 'temp_transaksi';
    protected $primaryKey = 'id_temp';
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
