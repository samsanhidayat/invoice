@extends('layouts.admin')

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-shopping-cart text-dark"></i> {{ $title }}
                        <a href="{{ url('admin/order') }}" class="btn btn-danger btn-sm float-end mx-1">Back</a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/download') }}"
                            class="btn btn-primary btn-sm float-end mx-1">Download Invoice</a>
                        <a href="{{ url('admin/invoice/' . $order->id) }}" target="_blank"
                            class="btn btn-success btn-sm float-end mx-1">View Invoice</a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}"
                            class="btn btn-outline-secondary btn-sm float-end mx-1">Send Invoice</a>
                    </h4>
                </div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Detail Customer</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Nama</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->fullname }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Email</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Phone</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Alamat</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->address }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Pincode</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->pincode }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Detail Order</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>No Tracking</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->tracking_no }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Mode Pembayaran</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->payment_code }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Id Pemabayaran</p>
                                </div>
                                <div class="col-md-9">
                                    <p>{{ $order->payment_id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Order Date</p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->created_at->format('d-m-Y h:i A') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Status</p>
                                </div>
                                <div class="col-md-9">
                                    @if ($order->status_message == 0)
                                        <span class="bg-warning rounded-2 p-1">Pending</span>
                                    @else
                                        <span class="bg-success rounded-2 p-1">Success</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <h5>Order</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItems as $orderItem)
                                            <tr>
                                                <td width="10%">#</td>
                                                <td width="10%">
                                                    @if ($orderItem->productOrder->productImage)
                                                        <img src="{{ asset('uploads/products/' . $orderItem->productOrder->productImage[0]->image) }}"
                                                            alt="{{ $orderItem->productOrder->name_product }}"
                                                            style="height: 50px;width:50px">
                                                    @else
                                                        <img src="" alt="" style="height: 50px;width:50px">
                                                    @endif
                                                </td>
                                                <td width="10%">{{ $orderItem->productOrder->name_product }}
                                                </td>
                                                <td width="10%">{{ $orderItem->productOrder->price_product }}
                                                </td>
                                                <td width="10%">{{ $orderItem->quantity }}</td>
                                                <td width="10%">{{ $orderItem->quantity * $orderItem->price }}
                                                </td>
                                                @php
                                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="1">Total Amount</td>
                                            <td colspan="5" class="text-end">Rp. {{ $totalPrice }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
