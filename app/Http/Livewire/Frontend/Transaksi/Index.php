<?php

namespace App\Http\Livewire\Frontend\Transaksi;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $snapToken, $amount = 0;

    public function totalAmount()
    {
        $this->amount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cart) {
            $this->amount +=  $cart->product->price_product * $cart->quantity;
        }
        return $this->amount;
    }
    public function render()
    {
        $this->amount =  $this->totalAmount();
        $order = Order::where('user_id', auth()->user()->id)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-TeNbFpz999Le8yVW-noQHJe3';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $this->amount
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $order->phone,
            ),
        );
        $this->snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('livewire.frontend.transaksi.index', [
            'order' => $order,
            'product' => $this->carts
        ]);
    }
}