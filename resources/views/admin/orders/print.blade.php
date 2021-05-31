<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quintaverde</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
            page-break-inside: avoid;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 50px;
        }

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }
        

        table {
            width: 90%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 10px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>
<body>
@foreach($orders as $order)
    <header class="clearfix" style="width: 90%">

        <div id="project">
            <div><span>PEDIDO</span> # {{ $order->id }}</div>
            <div><span>CLIENTE</span> {{ $order->user->fullname() }}</div>
            <div><span>DIRECCIÓN</span> {{ $order->user->address }}</div>
            <div><span>EMAIL</span> <a href="mailto:john@example.com">  </a></div>
            <div><span>FECHA</span> {{ $order->created_at }}</div>
            <div><span>A ENTREGAR</span>  </div>
        </div>
    </header>
    <main>
        <table>
            <thead>
            <tr>
                <th class="service">PRODUCTO</th>
                <th class="desc">DESCRIPCIÓN</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td class="service">{{ strtoupper($product->name) }}</td>
                    <td class="desc"> - </td>
                    <td class="unit">${{ $product->price }}</td>
                    <td class="qty">{{ $product->pivot['quantity'] . ' x ' . $product->get_unit() }}</td>
                    <td class="total"> $ {{ $product->price * $product->pivot['quantity'] }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4" class="grand total">TOTAL</td>
                <td class="grand total">$ {{ $order->total }}</td>
            </tr>
            </tbody>
        </table>
    </main>
    <br>
@endforeach
</body>
</html>
