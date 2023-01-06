<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{

    public $product, $quantityCount = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 50) {
            $this->quantityCount++;
        }
    }

    public function addToCart($productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->exists()) {
                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Already to added',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                } else {
                    if ($this->product->jml_product > 0) {
                        if ($this->product->jml_product > $this->quantityCount) {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('CartAdded');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product added to cart',
                                'type' => 'success',
                                'status' => 400
                            ]);
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Stock product just have' . $this->product->jml_product . 'The Quantity is Available',
                                'type' => 'warning',
                                'status' => 402
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Stock Product is Null',
                            'type' => 'warning',
                            'status' => 402
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not Exists',
                    'type' => 'warning',
                    'status' => 402
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login first to add your cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {

            $this->quantityCount--;
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view', ['product' => $this->product]);
    }
}