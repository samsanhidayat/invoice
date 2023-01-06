@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Dashboard') }}
                        <a href="{{ url('createPassword') }}" class="btn btn-warning">Change Password</a>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="mb-2">Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-2">Email</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror">
                                    @error('email')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="mb-2">Phone</label>
                                    <input type="text" name="phone"
                                        value="{{ auth()->user()->userDetail->phone ?? '' }}" placeholder="Phone"
                                        class="form-control @error('phone')
                                        is-invalid
                                    @enderror">
                                    @error('phone')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-2">Pincode</label>
                                    <input type="text" name="pincode"
                                        value="{{ auth()->user()->userDetail->pincode ?? '' }}" placeholder="Pin Code"
                                        class="form-control @error('pincode')
                                        is-invalid
                                    @enderror">
                                    @error('pincode')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="mb-2">Address</label>
                                    <textarea name="address" rows="4"
                                        class="form-control @error('address')
                                        is-invalid
                                    @enderror"
                                        placeholder="Address">{{ auth()->user()->userDetail->address ?? '' }}</textarea>
                                    @error('address')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
