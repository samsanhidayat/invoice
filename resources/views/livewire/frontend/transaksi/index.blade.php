<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3 transaksi">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="card tabelTransaksi">
                            <div class="card-header text-center">
                                <h4>Detail Transaksi</h4>
                                <div class="backTransaksi">
                                    <a href="" class="text-dark"><i class='fa fa-arrow-left'></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="text-primary">Detail Customer</h5>

                                <div class="row mb-1 mt-3">
                                    <div class="col-md-6">
                                        <p>Nama Penerima</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p>{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p>{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Phone</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p>{{ $order->phone }}</p>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-primary">Detail Transaksi</h5>
                                <div class="row mb-1 mt-3">
                                    <div class="col-md-6">
                                        <p>Status</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if ($order->status == 0)
                                            <span class="badge text-bg-warning">Pending</span>
                                        @else
                                            <span class="badge text-bg-success">Sukses</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Total</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p>Rp. {{ $this->amount }}</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-dark" id="pay-button">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-LYXAn1CUC6B5w2Ak"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endpush
