<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->product->jml_product > $cartData->quantity) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Has Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Stock Product Limitid',
                    'type' => 'warning',
                    'status' => 402
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Somthing wrong for this id',
                'type' => 'warning',
                'status' => 402
            ]);
        }
    }

    public function incrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->product->jml_product > $cartData->quantity) {

                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Has Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Stock Product Limitid',
                    'type' => 'warning',
                    'status' => 402
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Somthing wrong for this id',
                'type' => 'warning',
                'status' => 402
            ]);
        }
    }

    public function removeCartItem($cartId)
    {
        $cartRemove = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cartRemove) {
            $cartRemove->delete();
            $this->emit('CartAdded');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart product removed',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Somthing wrong in your data',
                'type' => 'error',
                'status' => 402
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'carts' => $this->cart
        ]);
    }
}