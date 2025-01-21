<!-- Modal -->
<div class="modal fade" id="my-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Belanja Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach ($data as $item)
                            @php
                                $totalPrice += $item->product->harga_product;
                            @endphp
                            <tr>
                                <td>
                                    <p>{{ $item->product->nama_product }}</p>
                                    <p>Total: {{ $item->total }}</p>
                                </td>
                                <td>
                                    Rp. {{ number_format($item->product->harga_product, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="fw-bold">Total</td>
                            <td>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btnTransaksi">Selesaikan Transaksi</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btnTransaksi').click(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "{{ url('/home/create') }}",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        var myModal = document.getElementById('my-modal');
                        var modal = bootstrap.Modal.getInstance(myModal);
                        modal.hide();

                        Swal.fire({
                            title: "Berhasil!",
                            icon: 'success',
                            text: response.success
                        })

                        getData()
                    }
                }
            });
        });
    });
</script>
