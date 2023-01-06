<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Price</h5>
            </div>
            {{-- <form action="{{ url('/search') }}" method="GET"> --}}
            <div class="card-body">
                <label class="d-block">
                    <input type="radio" name="priceShort" wire:model="priceInput" value="high-to-low" /> High to Low
                </label>
                <label class="d-block">
                    <input type="radio" name="priceShort" wire:model="priceInput" value="low-to-high" /> Low to High
                </label>
                <div class="input-group mt-4">
                    <input type="search" placeholder="Search your product" wire:model="search" class="form-control" />
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($product->jml_product > 0)
                                <label class="stock bg-success">{{ $product->jml_product }}</label>
                            @else
                                <label class="stock bg-danger">Stock Product Is Null</label>
                            @endif
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
                                <a href="{{ url('product/productView/' . $product->id) }}" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-9">
                    <div class="p-2">
                        <h4>No Product</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
{{-- @if ($products->links())
    <div>
        {!! $products->links() !!}
    </div>
@endif --}}
