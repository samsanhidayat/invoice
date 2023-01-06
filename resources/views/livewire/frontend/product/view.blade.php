<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImage->count() > 0)
                            {{-- <img src="{{ asset('uploads/products/' . $product->productImage[0]->image) }}"
                                alt="{{ $product->name_product }}" class="w-100"> --}}
                            <div class="exzoom" id="exzoom">
                                <!-- Images -->
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImage as $images)
                                            <li><img src="{{ asset('uploads/products/' . $images->image) }}" /></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                                <div class="exzoom_nav"></div>
                                <!-- Nav Buttons -->
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name_product }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / Product / {{ $product->name_product }}
                        </p>
                        <div>
                            <span class="selling-price">Rp. {{ $product->price_product }}</span>
                        </div>
                        <div>
                            @if ($product->jml_product)
                                <label class="label-stock bg-success">In Stock</label>
                            @else
                                <label class="label-stock bg-danger">Out Of Stock</label>
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click='decrementQuantity'><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model='quantityCount' value="{{ $this->quantityCount }}"
                                    readonly class="input-quantity" />
                                <span class="btn btn1" wire:click='incrementQuantity'><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click='addToCart({{ $product->id }})' class="btn btn1"> <i
                                    class="fa fa-shopping-cart"></i> Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4> {{ $product->name_product }}</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description_product }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('script')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": false,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });

        });
    </script>
@endpush
