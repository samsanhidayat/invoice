@extends('layouts.admin')

@section('contents')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Dashboard</h2>
                        <p class="mb-md-0">Your analytics dashboard template.</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body text-white mb-3 box">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-account-outline icon"></i>
                            <a href="{{ url('admin/user') }}" class="p-3 text-decoration-none text-icon">
                                <p>Total User</p>
                                <p class="text-center">{{ $totalUser }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-white mb-3 box">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-account-multiple-outline icon"></i>
                            <a href="{{ url('admin/user') }}" class="p-3 text-decoration-none text-icon">
                                <p>Total Customer</p>
                                <p class="text-center">{{ $totalCustomer }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-white mb-3 box">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-calculator icon"></i>
                            <a href="{{ url('admin/product') }}" class="p-3 text-decoration-none text-icon">
                                <p>Total Product</p>
                                <p class="text-center">{{ $totalProduct }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body text-white mb-3 box">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-calendar icon"></i>
                            <a href="{{ url('admin/order') }}" class="p-3 text-decoration-none text-icon">
                                <p>Total Order</p>
                                <p class="text-center">{{ $totalOrder }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-white mb-3 box">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-calendar-today icon"></i>
                            <a href="{{ url('admin/order') }}" class="p-3 text-decoration-none text-icon">
                                <p>Total Order Hari Ini</p>
                                <p class="text-center">{{ $orderNow }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-white mb-3 box">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-calendar-clock icon"></i>
                            <a href="{{ url('admin/order') }}" class="p-3 text-decoration-none text-icon">
                                <p>Total Order Bulanan</p>
                                <p class="text-center">{{ $orderMount }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
