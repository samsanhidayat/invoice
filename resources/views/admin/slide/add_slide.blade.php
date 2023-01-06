@extends('layouts.admin')
@section('contents')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $title }}</h3>
                        <a href="{{ url('admin/slide') }}" class="btn btn-outline-warning">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/slide') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Judul">Judul Slide</label>
                                    <input type="text" name="judul"
                                        class="form-control @error('judul')
                                        is-invalid
                                    @enderror"
                                        id="Judul" placeholder="Judul Slide" value="{{ old('judul') }}">
                                    @error('judul')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image')
                                    is-invalid
                                @enderror"
                                        placeholder="Image Slide">
                                    @error('image')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Desc">Description</label>
                            <textarea type="text" name="desc" rows="4"
                                class="form-control @error('desc')
                            is-invalid
                        @enderror"
                                id="Desc" placeholder="Description" value="{{ old('desc') }}"></textarea>
                            @error('desc')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
