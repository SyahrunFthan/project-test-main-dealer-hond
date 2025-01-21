<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Keranjang Belanja Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() > 0)
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($data as $item)
                                @php
                                    $totalPrice += $item->product->harga_product;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <p>{{ $item->product->nama_product }}</p>
                                        <p>Rp. {{ number_format($item->product->harga_product, 0, ',', '.') }}</p>
                                        <p>Total: {{ $item->total }}</p>
                                    </td>
                                    <td>
                                        <button type="button" onclick="hapusData({{ $item->id_temp }})"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="fw-bold">Total</td>
                                <td>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3" class="fw-bold text-center fst-italic text-secondary">Keranjang
                                    Kosong!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                @if ($data->count() > 0)
                    <button type="button" class="btn btn-primary" id="transaksi">Lanjutkan</button>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#transaksi').click(function(e) {
            e.preventDefault();
            var myModal = document.getElementById('staticBackdrop');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            $.ajax({
                type: 'GET',
                url: "{{ url('/home/show-modal-confirm') }}",
                dataType: "json",
                success: function(response) {
                    $('#modalContainer').html(response.success);
                    var mymodal = new bootstrap.Modal(document.getElementById(
                        'my-modal'));
                    mymodal.show()
                }
            });
        });
    });

    function hapusData(id) {
        $.ajax({
            type: "DELETE",
            url: "/home/delete/" + id,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                var myModalEl = document.getElementById('staticBackdrop');
                var modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
                Swal.fire({
                    title: "Berhasil",
                    icon: "success",
                    text: response.success
                })
                getData()
            }
        });
    }
</script>
