<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\TempTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){

        $query = Product::query();
        if($request->kategori){
            $query->where('kategori_id', $request->kategori)->paginate(8);
        }
        
        if($request->search){
            $query->where('nama_product', 'like', '%' . $request->search . '%');
        }

        $product = $query->paginate(8);
        return view('users.home.home')->with([
            'kategori' => Kategori::all(),
            'product' => $product
        ]);
    }

    public function detail(Int $id){
        return view('users.home.detail')->with([
            'product' => Product::find($id)
        ]);
    }

    public function addCart(Request $request)
    {
        $id = $request->product_id;
        $userId = Auth::user()->id_user;

        $checkProduct = Product::find($id);

        if($checkProduct->stok < 1){
            return response()->json(['error' => 'Stok produk habis!']);
        }

        $tanggal = date('Y-m-d');

        $data =[
            'product_id' => $id,
            'user_id' => $userId,
            'total' => 1,
            'total_harga' => $checkProduct->harga_product,
            'tanggal' => $tanggal
        ];

        TempTransaksi::create($data);
        
        return response()->json(['success' => 'Produk di tambahkan!']);
    }

    public function showModal()
    {
        $userId = Auth::user()->id_user;
        $data = TempTransaksi::with('product')->where('user_id', $userId)->get();
    
        $modalView = view('users.home.modal')->with('data', $data)->render();
    
        return response()->json(['success' => $modalView]);
    }

    public function delete(int $id)
    {
        TempTransaksi::find($id)->delete();

        return response()->json(['success' => 'Produk berhasil di hapus!']);
    }

    public function showModalConfirm()
    {
        $userId = Auth::user()->id_user;
        $data = TempTransaksi::with('product')->where('user_id', $userId)->get();

        $modalView = view('users.home.modalConfirm')->with('data', $data)->render();

        return response()->json(['success' => $modalView]);
    }

    public function createTransaksi()
    {
        $userId = Auth::user()->id_user;
        $dataTemp = TempTransaksi::where('user_id', $userId)->get();

        foreach($dataTemp as $item) {
            $product = Product::find($item->product_id);
            $temp = TempTransaksi::find($item->id_temp);

            $product->update([
                'stok' => $product->stok - $item->total
            ]);

            $data = [
                'product_id' => $item->product_id,
                'user_id' => $userId,
                'total' => $item->total,
                'total_harga' => $item->total_harga,
                'tanggal' => date('Y-m-d')
            ];

            Transaksi::create($data);
            $temp->delete();
        }

        return response()->json(['success' => 'Transaksi berhasil!']);
    }

    public function getData()
    {
        $userId = Auth::user()->id_user;
        $temp =TempTransaksi::where('user_id', $userId)->count();

        return response()->json(['success' => $temp]);
    }
}
