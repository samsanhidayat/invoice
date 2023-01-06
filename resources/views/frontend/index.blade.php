@extends('layouts.app')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slide)
                <div class="carousel-item active">
                    @if ($slide->image)
                        <img src="{{ asset('uploads/sliders/' . $slide->image) }}" class="d-block w-100" style="height: 500px"
                            alt="{{ $slide->judul }}">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                <span>Best Ecommerce Solutions 1 </span>
                                to Boost your Brand Name &amp; Sales
                            </h1>
                            <p>
                                We offer an industry-driven and successful digital marketing strategy that helps our clients
                                in achieving a strong online presence and maximum company profit.
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- <div class="py-5 bg-white welcome">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome To My Toko</h4>
                    <div class="underline mx-auto"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi id reprehenderit sequi nisi sint
                        sit, at tempora dolore aliquam aperiam pariatur consectetur quidem soluta iure nam ipsum repellendus
                        veritatis fuga!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, quaerat cum! Pariatur vel iusto
                        illo doloribus ipsum qui porro non quia assumenda, soluta, ullam iure suscipit itaque facilis
                        voluptatibus iste.
                    </p>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Product</h4>
                    <div class="underline"></div>
                </div>
                @if ($trendingProduct)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($trendingProduct as $product)
                                <div class="item">
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
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Product</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleCaptions')
        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 4000,
            wrap: true
        })

        $('.trending-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
