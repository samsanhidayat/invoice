@extends('layouts.admin')

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $title }}</h3>
                        <a href="{{ url('admin/user') }}" class="btn btn-outline-warning">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/user') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('name') }}" placeholder="Input type text">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('email') }}" placeholder="Input type text">
                                    @error('email')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        placeholder="Input type text">
                                    @error('password')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control  @error('password_confirmation')
                                        is-invalid
                                    @enderror"
                                        placeholder="Input type text">
                                    @error('password_confirmation')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Role</label>
                                    <select
                                        class="form-select @error('role')
                                        is-invalid
                                    @enderror"
                                        name="role" aria-label="Default select example">
                                        <option selected disabled value="">Pilih Role</option>
                                        <option value="2">Admin</option>
                                    </select>
                                    @error('role')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
