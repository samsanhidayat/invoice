<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('frontend.transaksi.index');
    }

    public function show()
    {
        $order = Order::where('user_id', auth()->user()->id)->paginate(10);
        return view('frontend.order.index', compact('order'))->with([
            'title' => 'Daftar Order Customer'
        ]);
    }

    public function detailOrder(Order $order)
    {
        $order = Order::where('id', $order->id)->where('user_id', auth()->user()->id)->first();
        return view('frontend.order.show', compact('order'));
    }
}