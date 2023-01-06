@extends('layouts.admin')

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Filter by date</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ Request::get('date') ?? date('Y-m-d') }}">
                            </div>
                            <div class="col-md-3">
                                <label>Filter by status</label>
                                <select name="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>Success
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <hr>
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
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $order->fullname }}</td>
                                        <td>{{ $order->payment_code }}</td>
                                        <td>{{ $order->tracking_no }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if ($order->status_message == 0)
                                                <span class="bg-warning rounded-2 p-1">Pending</span>
                                            @else
                                                <span class="bg-success rounded-2 p-1">Success</span>
                                            @endif
                                        </td>
                                        <td> <a href="{{ url('admin/order/' . $order->id) }}"
                                                class="btn btn-primary">Show</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
