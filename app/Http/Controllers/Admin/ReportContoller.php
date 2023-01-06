<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ReportContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $today = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        })
            ->when($request->status != null, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })
            ->paginate(5);
        return view('admin.report.index', compact('orders'))->with([
            'title' => 'Report Order',
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function sendGmail(Order $order)
    {
        try {
            Mail::to("$order->email")->send(new InvoiceOrderMail($order));
            return redirect('admin/order/' . $order->id)->with('message', 'Invoice Mail Has Been Send' . $order->email);
        } catch (\Exception $e) {
            return redirect('admin/order/' . $order->id)->with('message', 'Something wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderItem = Order::where('id', $order->id)->first();
        return view('admin.report.show')->with([
            'title' => 'Detail Report Order',
            'order' => $orderItem
        ]);
    }

    public function showInvoice(Order $order)
    {
        return view('admin.invoice.show', compact('order'));
    }

    public function pdfUnduh(Order $order)
    {
        $data = ['order' => $order];

        $pdf = Pdf::loadView('admin.invoice.show', $data);
        $today = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $order->id . '-' . $today . '.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}