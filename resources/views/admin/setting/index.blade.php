@extends('layouts.admin')
@section('contents')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ url('admin/setting') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="text-dark mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" class="form-control" value="{{ $setting->name_website }}"
                                    name="name_website">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website URL</label>
                                <input type="text" class="form-control" value="{{ $setting->url_website }}"
                                    name="url_website">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Page Title</label>
                                <input type="text" class="form-control" value="{{ $setting->page_title }}"
                                    name="page_title">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <input type="text" class="form-control" value="{{ $setting->keywords }}" name="keywords">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>About</label>
                                <textarea name="about" rows="4" class="form-control">{{ $setting->about }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="4" class="form-control">{{ $setting->description_website }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="text-dark mb-0">Website Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Phone</label>
                                <input type="text" class="form-control" value="{{ $setting->phone_website }}"
                                    name="phone">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Email</label>
                                <input type="email" value="{{ $setting->email_website }}" class="form-control"
                                    name="email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Phone Whats Up</label>
                                <input type="text" class="form-control" value="{{ $setting->wa_website }}"
                                    name="wa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="address" rows="4" class="form-control">{{ $setting->address_website }}"</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="text-dark mb-0">Sosial Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="fb">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="ig">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Youtube</label>
                                <input type="text" class="form-control" name="youtube">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter</label>
                                <input type="text" class="form-control" name="twitter">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
