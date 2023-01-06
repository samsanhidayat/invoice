@extends('layouts.app')

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">{{ $title }}</h4>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $title }}</h3>
                                <a href="{{ url('admin/product/create') }}" class="btn btn-outline-primary">Add Product</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Payment Mode</th>
                                            <th>No tracking</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $orderItem)
                                            <tr>
                                                <td>#</td>
                                                <td>{{ $orderItem->fullname }}</td>
                                                <td>{{ $orderItem->payment_code }}</td>
                                                <td>{{ $orderItem->tracking_no }}</td>
                                                <td>{{ $orderItem->created_at->format('d-m-y') }}</td>
                                                <td>
                                                    @if ($orderItem->status_message == 0)
                                                        <span class="bg-warning rounded-2 p-1">Pending</span>
                                                    @else
                                                        <span class="bg-success rounded-2 p-1">Success</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('order/detailOrder/' . $orderItem->id) }}"
                                                        class="btn btn-warning">Show</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $order->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
