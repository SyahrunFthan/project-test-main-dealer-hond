<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $product = Product::all()->count();
        $kategori = Kategori::all()->count();
        $user = User::all()->count();

        $sales = DB::table('transaksi')
        ->join('product', 'transaksi.product_id', '=', 'product.id_product')
        ->select('product.nama_product', DB::raw('SUM(total) as total_sales'))
        ->groupBy('product.nama_product')
        ->orderBy('total_sales', 'desc')
        ->take(10)
        ->get();

        return view('admin.home.home')->with([
            'product' => $product,
            'kategori' => $kategori,
            'user' => $user,
            'sales' => $sales
        ]);
    }
}
