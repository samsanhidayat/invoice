<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
            height: 100vh;
            background-color: rgb(247, 116, 116);

        }

        .contents {
            width: 100%;
        }

        .header1 {
            padding: 20px;
            text-align: center;
            line-height: 23px;
        }

        .header2 {
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 10px;
        }

        table thead th {
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            font-size: 14px;
        }

        .bio {
            padding: 10px;
        }

        .tabel {
            border: 1px solid #111;
            width: 100%;
            margin-top: 30px;
        }

        .tabel1 {
            border: 1px solid #111;
            font-size: 18px;
        }

        .line {
            border: 1px solid #111
        }
    </style>
</head>

<body>

    <div class="contents">
        <div class="header1">
            <span><b>PT Sirin Tulin Indojaya</b></span>
            <br>
            <span>Telp. (081292654774)</span>
            <br>
            <span>Pt_sirin_tulin_indojaya@gmail.com</span>
            <br>
            <span>Jl. Daan Mogot I No.55, RT.11/RW.6, Kalideres, Kec. Kalideres, Kota Jakarta Barat, Daerah
                Khusus Ibukota Jakarta 11840</span>
        </div>
        <div class="header2">
            <span>Invoice</span>
        </div>
        <div class="line"></div>
        <div class="bio">
            <table>
                <thead>
                    <tr>
                        <th width="80%" colspan="2">
                            <span>Name : {{ $order->fullname }}</span> <br>
                            <span>Email : {{ auth()->user()->email }}</span> <br>
                            <span>Phone : {{ $order->phone }}</span> <br>
                            <span>Address : {{ $order->address }}</span>
                        </th>
                        <th width="50%" colspan="2">
                            <span>No Tracking : {{ $order->tracking_no }}</span> <br>
                            <span>Tanggal Pemesanan : {{ $order->created_at->format('d-m-Y') }}</span> <br>
                            <span>Pembayaran : {{ $order->payment_code }}</span> <br>
                            @if ($order->status_message == 0)
                                <span>Status:</span> <span style="background-color: orange">Pending</span>
                            @endif
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="tabel">
                <thead>
                    <tr>
                        <th class="tabel1">No</th>
                        <th class="tabel1">Product</th>
                        <th class="tabel1">Price</th>
                        <th class="tabel1">Quantity</th>
                        <th class="tabel1">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($order->orderItems as $orderItem)
                        <tr>
                            <td class="tabel1">#</td>
                            <td class="tabel1">{{ $orderItem->productOrder->name_product }}</td>
                            <td class="tabel1">{{ $orderItem->productOrder->price_product }}</td>
                            <td class="tabel1">{{ $orderItem->quantity }}</td>
                            <td class="tabel1">{{ $orderItem->quantity * $orderItem->price }}</td>
                            @php
                                $totalPrice += $orderItem->quantity * $orderItem->price;
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="tabel1">Total Amount :</td>
                        <td colspan="1" class="tabel1">Rp. {{ $totalPrice }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
