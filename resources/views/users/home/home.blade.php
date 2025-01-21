@extends('users.layouts.main')

@section('content')
    <form method="GET" action="{{ route('home') }}">
        @csrf
        <div class="row mx-3 my-3">
            <div class="col-12 justify-content-between d-flex">
                <div>
                    <select name="kategori" id="kategori" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="0">Semua Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <div class="mb-3 d-flex gap-2">
                        <div>
                            <input type="text" name="search" id="serch" value="{{ request('search') }}"
                                class="form-control form-control-sm" placeholder="Cari">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-dark">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                        @auth
                            <div>
                                <button type="button" id="showModal"
                                    class="btn btn-sm btn-warning text-white position-relative">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        id="totalBelanja">
                                    </span>
                                </button>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
    </form>

    @if ($product->count() > 0)
        @foreach ($product as $item)
            <div class="col-12 col-md-3 mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($item->foto_product) }}" height="150px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_product }}</h5>
                        <h3 class="card-text">Rp. {{ number_format($item->harga_product, 0, ',', '.') }}</h3>
                        <a href="{{ url('/detail/' . $item->id_product) }}" class="btn btn-primary btn-sm mt-3">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-12 justify-content-center">
                <h1 class="fw-semi-bold text-secondary text-center" style="font-style: italic">Produk Kosong!</h1>
            </div>
        </div>
    @endif
    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            {{ $product->links('vendors.pagination.bootstrap-5') }}
        </div>
    </div>

    <div id="modalContainer"></div>

    <script>
        $(document).ready(function() {
            $('#showModal').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('showModal') }}",
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $('#modalContainer').html(response.success);
                            var mymodal = new bootstrap.Modal(document.getElementById(
                                'staticBackdrop'));
                            mymodal.show()
                        }
                    }
                });
            });
            getData()
        });

        function getData() {
            $.ajax({
                type: "GET",
                url: "{{ url('/home/data-temp') }}",
                dataType: "json",
                success: function(response) {
                    if (response.success === 0) {
                        $('#totalBelanja').hide();
                    } else {
                        $('#totalBelanja').html(response.success);
                    }
                }
            });
        }
    </script>
@endsection
