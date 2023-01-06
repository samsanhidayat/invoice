@extends('layouts.app')
@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Product</h4>
                    <div class="underline"></div>
                </div>
                @forelse ($featured as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-success">New</label>
                                @if ($product->productImage->count() > 0)
                                    <img src="{{ asset('uploads/products/' . $product->productImage[0]->image) }}"
                                        alt="{{ $product->name_product }}">
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->name_product }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('product/productView/' . $product->id) }}">
                                        {{ $product->name_product }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">Rp. {{ $product->price_product }}</span>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="{{ url('product/productView/' . $product->id) }}" class="btn btn1">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Product</h4>
                        </div>
                    </div>
                @endforelse
                <div class="text-center">
                    <a href="{{ url('product') }}" class="btn btn-warning px-3">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
