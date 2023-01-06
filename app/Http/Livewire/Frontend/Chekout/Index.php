<?php

namespace App\Http\Livewire\Frontend\Chekout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class Index extends Component
{

    public $carts, $totalAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = null, $payment_id = null;



    public function rules()
    {
        return [
            'fullname' => 'required|max:120',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:11',
            'pincode' => 'required|integer|min:6',
            'address' => 'required|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order =  Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'PSIJ-' . time(),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'payment_code' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach ($this->carts as $cart) {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product->id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price_product
            ]);

            if ($cart->product_id != null) {
                $cart->product->where('id', $cart->product_id)->decrement('jml_product', $cart->quantity);
            }
        }

        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash On Delivery';
        $codOrder = $this->placeOrder();

        if ($codOrder) {

            Cart::where('id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'checkout successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Somthing wrong from your form',
                'type' => 'error',
                'status' => 410
            ]);
        }
    }

    public function transaksi()
    {

        $this->payment_mode = 'Online Payment';
        $this->payment_id = 'PTSLJ' . time();
        $codOrder = $this->placeOrder();

        if ($codOrder) {

            Cart::where('id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'checkout successfully',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect('transaksi');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Somthing wrong from your form',
                'type' => 'error',
                'status' => 410
            ]);
        }
    }

    public function totalAmount()
    {
        $this->totalAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cart) {
            $this->totalAmount +=  $cart->product->price_product * $cart->quantity;
        }
        return $this->totalAmount;
    }


    public function render()
    {

        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalAmount =  $this->totalAmount();
        return view('livewire.frontend.chekout.index', [
            'totalAmount' => $this->totalAmount,
        ]);
    }
}