<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.kategori')->with([
            'kategori' => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|unique:kategori,title'
       ],[
        'title.required' => 'Kategori tidak boleh kosong!',
        'title.unique' => 'Kategori sudah ada!'
       ]);

       Kategori::create([
        'title' => $request->title
       ]);

       return redirect('/kategori')->with('success', 'Kategori berhasil di simpan!');
    }

    public function destroy(Int $id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();

        return response()->json(['success' => 'Kategori berhasil di hapus!']);
    }
}
