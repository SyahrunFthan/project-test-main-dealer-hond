@extends('layouts.main')

@section('content')
    <div class="mb-3">
        <h3 class="fw-bold fs-4">Admin Dashboard</h3>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-home border-0">
                    <div class="card-body">
                        <h5 class="mb-2 fw-bold">
                            Data Pengguna
                        </h5>
                        <p class="mb-2 fw-bold">
                            {{ $user }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-home border-0">
                    <div class="card-body">
                        <h5 class="mb-2 fw-bold">
                            Data Produk
                        </h5>
                        <p class="mb-2 fw-bold">
                            {{ $product }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-home border-0">
                    <div class="card-body">
                        <h5 class="mb-2 fw-bold">
                            Data Kategori
                        </h5>
                        <p class="mb-2 fw-bold">
                            {{ $kategori }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div style="width: 75%; margin: auto;">
                    <canvas id="penjualan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('penjualan').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($sales->pluck('nama_product')) !!},
                    datasets: [{
                        label: 'Total Sales',
                        data: {!! json_encode($sales->pluck('total_sales')) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
