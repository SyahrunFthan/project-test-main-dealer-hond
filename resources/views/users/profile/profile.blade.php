@extends('users.layouts.main')

@section('content')
    <div class="row mx-3 my-3">
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $user->email }}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <h4 class="fw-semibold">Riwayat Transaksi</h4>
                    </div>
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Produk</th>
                                <th>Total</th>
                                <th>Tanggal Pembelian</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Carbon\Carbon;
                                $totalPrice = 0;
                            @endphp
                            @foreach ($transaksi as $item)
                                @php
                                    $totalPrice += $item->total_harga;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->nama_product }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="4" class="fw-bold text-center">Total Pembelian</th>
                                <td>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
