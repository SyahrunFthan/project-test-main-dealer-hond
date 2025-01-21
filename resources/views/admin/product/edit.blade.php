@extends('layouts.main')

@section('content')
    <div class="mb-3">
        <h3 class="fw-bold fs-4">Admin Edit Product</h3>
        <div class="row mt-3">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('product-admin/' . $product->id_product) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="namaProduct" class="form-label">Nama Product</label>
                                <input type="text" name="namaProduct" id="namaProduct"
                                    class="form-control @error('namaProduct')
                                    is-invalid
                                @enderror"
                                    style="width: 35%;" placeholder="Enter Product" value="{{ $product->nama_product }}"
                                    autofocus>
                                @error('namaProduct')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hargaProduct" class="form-label">Harga Product</label>
                                <input type="number" name="hargaProduct" id="hargaProduct"
                                    class="form-control  @error('hargaProduct')
                                    is-invalid
                                @enderror"
                                    style="width: 25%;" placeholder="Enter Harga" value="{{ $product->harga_product }}"
                                    autofocus>
                                @error('hargaProduct')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok Product</label>
                                <input type="number" name="stok" id="stok"
                                    class="form-control  @error('stok')
                                    is-invalid
                                @enderror"
                                    style="width: 25%;" placeholder="0" value="{{ $product->stok }}" autofocus>
                                @error('stok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select
                                    class="form-select @error('kategori')
                                    is-invalid
                                @enderror"
                                    style="width: 35%" name="kategori" id="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id_kategori }}"
                                            {{ $item->id_kategori == $product->kategori_id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fotoProduct" class="form-label">Upload Gambar</label>
                                <input type="file" name="fotoProduct" id="fotoProduct"
                                    class="form-control @error('fotoProduct')
                                    is-invalid
                                @enderror"
                                    style="width: 35%;" placeholder="0" autofocus>
                                @error('fotoProduct')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="20" rows="3"
                                    class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror"
                                    placeholder="Enter Detail Produk" style="width: 35%">{{ $product->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                <a href="{{ url('product-admin') }}" type="submit"
                                    class="btn btn-warning text-white">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
