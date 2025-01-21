@extends('layouts.main')

@section('content')
    <div class="mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="fw-bold fs-4">Admin Product</h3>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-end">
                <a class="btn btn-primary" href="{{ url('product-admin/create') }}" role="button">Tambah Data</a>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama_product }}</td>
                                        <td>{{ 'Rp. ' . number_format($row->harga_product, 0, ',', '.') }}</td>
                                        <td>{{ $row->stok }}</td>
                                        <td>{{ $row->kategori->title }}</td>
                                        <td>
                                            <a href="{{ url('product-admin/' . $row->id_product . '/edit') }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form class="d-inline" method="POST"
                                                action="{{ url('product-admin/' . $row->id_product) }}"
                                                onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus produk ini?');
        }
    </script>
@endsection
