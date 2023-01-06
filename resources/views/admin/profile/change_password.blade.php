@extends('layouts.admin')
@section('contents')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="mb-0 text-dark">Change Password</h4>
                        </div>
                        @if (session('message'))
                            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                        @endif
                        <div class="card-body">
                            <form action="{{ url('admin/change-password') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password"
                                        class="form-control @error('current_password')
                                        is-invalid
                                    @enderror" />
                                    @error('current_password')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror" />
                                    @error('password')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required />
                                </div>
                                <div class="mb-3 text-end">
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
