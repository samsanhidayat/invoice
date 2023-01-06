@extends('layouts.admin')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $title }}</h3>
                        <a href="{{ url('admin/product') }}" class="btn btn-outline-warning">Back</a>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('admin/product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-pane" type="button" role="tab"
                                    aria-controls="product-tab-pane" aria-selected="true">Product</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">Product
                                    Image</button>
                            </li>
                        </ul>
                        <div class="tab-content border" id="myTabContent">
                            <div class="tab-pane fade show active p-3" id="product-tab-pane" role="tabpanel"
                                aria-labelledby="product-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Kode" class="form-label">Kode Product</label>
                                            <input type="text" class="form-control" id="Kode"
                                                value="{{ $product->kode_product }}" name="kode" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Name" class="form-label">Name Product</label>
                                            <input type="text" value="{{ $product->name_product }}"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                id="Name" name="name" placeholder="Name Product" />
                                            @error('name')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="Desc" class="form-label">Description Product</label>
                                            <textarea name="desc" id="Desc" rows="4"
                                                class="form-control @error('desc')
                                                is-invalid
                                            @enderror"
                                                placeholder="Desckripsi Product">{{ $product->description_product }}</textarea>
                                            @error('desc')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mx-4">
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    {{ $product->trending == '1' ? 'checked' : '' }} name="trending">
                                                <label class="form-check-label">Trending</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mx-4">
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    {{ $product->featured == '1' ? 'checked' : '' }} name="featured">
                                                <label class="form-check-label">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Price" class="form-label">Price Product</label>
                                            <input type="number" id="Price" name="price"
                                                value="{{ $product->price_product }}"
                                                class="form-control @error('price')
                                                is-invalid
                                            @enderror" />
                                            @error('price')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Jml" class="form-label">Jumlah Product</label>
                                            <input type="number" id="Jml" value="{{ $product->jml_product }}"
                                                name="jml"
                                                class="form-control @error('jml')
                                                is-invalid
                                            @enderror">
                                            @error('jml')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="Image" class="form-label">Image Product</label>
                                    <input type="file" id="Image" name="image[]" multiple class="form-control">
                                </div>
                                <div class="m-3">
                                    @if ($product->productImage)
                                        <div class="row">
                                            @foreach ($product->productImage as $image)
                                                <div class="col-md-1">
                                                    <img src="{{ asset('/uploads/products/' . $image->image) }}"
                                                        style="width:80px;height:80px" class="me-4 border"
                                                        alt="img" />
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h4>No Image Uploaded</h4>
                                    @endif
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
