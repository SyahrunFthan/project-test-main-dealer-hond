<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.product')->with([
            'product' => Product::with('kategori')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create')->with([
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaProduct' => 'required|string',
            'hargaProduct' => 'required|integer',
            'stok' => 'required|integer',
            'kategori' => 'required',
            'fotoProduct' => 'required|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ], [
            'namaProduct.required' => "Nama Produk Tidak Boleh Kosong!",
            'namaProduct.string' => "Nama Produk Berupa Huruf!",
            'hargaProduct.required' => "Harga Produk Tidak Boleh Kosong!",
            'hargaProduct.integer' => "Harga Produk Berupa Angka!",
            'stok.required' => "Stok Tidak Boleh Kosong!",
            'stok.integer' => "Stok Berupa Angka!",
            'kategori.required' => 'Kategori harus di pilih!',
            'fotoProduct.required' => "Foto Produk Tidak Boleh Kosong!",
            'fotoProduct.mimes' => "Foto Produk Harus Berupa png,jpg,jpeg!",
            'deskripsi.required' => "Deskripsi Tidak Boleh Kosong!"
        ]);



        if($request->has('fotoProduct')){
            $file = $request->file('fotoProduct');
            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;
            $path = 'uploads/product/';
            $file->move($path, $filename);
        }

        $data = [
            'nama_product' => $request->namaProduct,
            'harga_product' => $request->hargaProduct,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori,
            'foto_product' => $path.$filename,
            'deskripsi' => $request->deskripsi
        ];

        Product::create($data);

        return redirect('product-admin')->with('status', 'Produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.product.edit', compact('product', 'kategori'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'namaProduct' => 'required|string',
            'hargaProduct' => 'required|integer',
            'stok' => 'required|integer',
            'kategori' => 'required',
            'fotoProduct' => 'mimes:png,jpg,jpeg',
            'deskripsi' => 'required'
        ], [
            'namaProduct.required' => "Nama Produk Tidak Boleh Kosong!",
            'namaProduct.string' => "Nama Produk Berupa Huruf!",
            'hargaProduct.required' => "Harga Produk Tidak Boleh Kosong!",
            'hargaProduct.integer' => "Harga Produk Berupa Angka!",
            'stok.required' => "Stok Tidak Boleh Kosong!",
            'stok.integer' => "Stok Berupa Angka!",
            'kategori.required' => "Kategori tidak boleh kosong!",
            'fotoProduct.mimes' => "Foto Produk Harus Berupa png,jpg,jpeg!",
            'deskripsi.required' => "Deskripsi Tidak Boleh Kosong!"
        ]);

        $product = Product::findOrFail($id);
        $filename = $product->foto_product;
        
        if($request->has('fotoProduct')){
            $file = $request->file('fotoProduct');
            $ext = $file->getClientOriginalExtension();
            
            $path = 'uploads/product/';
            $filename = $path.time().'.'.$ext;
            $file->move($path, $filename);
            
            if(File::exists($product->foto_product)){
                File::delete($product->foto_product);
            }
        }else{
            $filename = $product->foto_product;
        }

        $data = [
            'nama_product' => $request->namaProduct,
            'harga_product' => $request->hargaProduct,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori,
            'foto_product' => $filename,
            'deskripsi' => $request->deskripsi
        ];

        $product->update($data);

        return redirect('product-admin')->with('status', 'Produk berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        if(File::exists($product->foto_product)){
            File::delete($product->foto_product);
        }

        $product->delete();

        return redirect('product-admin')->with('status', 'Produk berhasil di hapus!');
    }
}
