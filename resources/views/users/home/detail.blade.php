@extends('users.layouts.main')

@section('content')
    <div class="row mx-3 my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <img src="{{ asset($product->foto_product) }}" width="220" height="200" alt="">
                            <h3 class="fw-bold">{{ $product->nama_product }}</h3>
                            <h5 class="fw-semibold text-secondary">Rp.
                                {{ number_format($product->harga_product, 0, ',', '.') }}</h5>
                            <p class="text-lead">{{ $product->deskripsi }}</p>
                            <p class="text-lead fw-semibold">Stok: {{ $product->stok }}</p>
                            @auth
                                <button type="button" id="addToCart" data-product-id="{{ $product->id_product }}"
                                    class="btn btn-sm btn-warning fw-semibold text-white">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    Tambah Keranjang
                                </button>
                            @endauth
                            @guest
                                <a href="{{ route('auth') }}" class="btn btn-sm btn-warning fw-semibold text-white">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    Tambah Keranjang
                                </a>
                            @endguest
                        </div>
                        <div class="col-12 col-md-6 justify-content-end align-items-start d-flex">
                            <a href="{{ url('/') }}" class="btn btn-sm btn-warning fw-semibold text-white">
                                <i class="fa-solid fa-circle-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#addToCart').click(function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');

                $.ajax({
                    type: "POST",
                    url: "{{ route('addCart') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                icon: "success",
                                text: response.success
                            }).then((res) => {
                                window.location.href = '/'
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                icon: "error",
                                text: response.error
                            })
                        }
                    }
                });
            });
        });
    </script>
@endsection
