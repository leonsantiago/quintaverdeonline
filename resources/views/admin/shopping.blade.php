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
        padding: 20px 20px;
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
        padding: 10px 5px;
        text-align: center;
      }

      table td.service,
      table td.desc {
        vertical-align: top;
      }

      table td.unit,
      table td.qty,
      table td.desc,
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
  </header>
  <main>
    <table>
      <thead>
      <tr class="header">
        <th style="font-weight: 900 !important">Fecha: {{ date('d-m-Y')}}</th>
        <th style="font-weight: 900 !important">Cantidad de pedidos: {{ $orders->count() }} </th>
        <th style="font-weight: 900 !important">Cantidad de productos: {{ count($order_details) }}</th>
      </tr>
      <tr>
        <th class="service" style="width: 10% !important;">N°</th>
        <th class="desc">PRODUCTO</th>
        <th>CANTIDAD</th>
        <th style="width: 25% !important;">OBSERVACIONES</th>
      </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
      @foreach($order_details as $product1)
        <tr>
          <td class="service">{{ $i }}</td>
          <td class="desc"> {{ $product->name }} </td>
          <td class="unit">{{ $product->quantity . ' ' . $product->unit }}</td>
          <td class="qty"></td>
        </tr>
      <?php $i++ ?>
      @endforeach
      </tbody>
    </table>
  </main>
  <br>
</body>
</html>
