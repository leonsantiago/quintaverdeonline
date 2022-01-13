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
            width: 90px;
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

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
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
            padding: 20px;
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
<header class="clearfix" style="width: 90%">
    <div id="logo">
      <img  src="{{ public_path("/image/icons/icon.png") }}" class="rounded" style="height: 100px" alt="Quinta verde logo">
    </div>
    <h1>PEDIDO N°: {{ $order->id }}</h1>
    <div id="company" class="clearfix">
        <div>Quintaverde</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">www.quintaverde.online</a></div>
    </div>
    <div id="project">
        <div><span>PEDIDO</span> # {{ $order->id }}</div>
        <div><span>CLIENTE</span> {{ $client->name . ' ' . $client->lastname }}</div>
        <div><span>DIRECCIÓN</span> {{ $client->address }}</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">  </a></div>
        <div><span>FECHA</span> {{ $order->created_at }}</div>
        <div><span>A ENTREGAR</span>{{ $order->deliverDate() }}  </div>
    </div>
</header>
<main>
    <table>
      @if (isset($order->products))
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
            <td class="qty">{{ $product->pivot['quantity'] . ' x ' . $product->get_unit($product->unit, $product->pivot['quantity']) }}</td>
            <td class="total"> $ {{ number_format($order->productSubtotal($product->id),2,',','.') }}</td>
          </tr>
        @endforeach
      @endif
      @if (isset($order->promotions))
        {{-- <tr>
          <th class="service">PROMOCIÓN</th>
          <th>DESCRIPCIÓN</th>
          <th>PRECIO</th>
          <th>CANTIDAD</th>
          <th>SUBTOTAL</th>
        </tr> --}}
        @foreach ($order->promotions as $promotion)
          <tr>
            <td class="service">{{ strtoupper($promotion->name) }}</td>
            <td class="desc">
              <ul>
                @foreach ($promotion->products as $product )
                  <li>{{ $product->name }} x {{ $product->pivot['quantity'] }} {{ $product->get_unit($product->unit, $product->pivot['quantity']) }}</li>
                @endforeach
              </ul>
            </td>
            <td class="unit">$ {{ $promotion->price }}</td>
            <td class="qty">{{ $promotion->pivot['quantity'] }} un.</td>
            <td class="total"> $ {{ number_format($order->promotionSubtotal($promotion->id),2,',','.') }}</td>
          </tr>
        @endforeach
      @endif

        <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">$ {{ number_format($order->total,2,',','.') }}</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">
        <div>AVISO: </div>
        <div class="notice">Las entregas se realizan de Lunes a  Viernes solo por las mañanas.

            Únicamente para Yerba Buena.

            Ante cualquier consulta comunicarse al: +54 381 212-8953
          </div>
    </div>
</main>
<footer>
    No es valido como factura.
</footer>
</body>
</html>
