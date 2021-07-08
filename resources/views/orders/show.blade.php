@extends('index')

@section('content')
  @if (\Session::has('success'))
    <div class="alert alert-success col-10 mx-auto text-center">
        {!! \Session::get('success') !!}
    </div>
  @endif
  <div class="row">
    <div class="col-11 text-center">
      <h1 class="display-2">Pedido # {{ $order->id }}</h1>
    </div>
  </div>
  <div class="form-group">
    <ul>
      <li>Cliente: {{ $client->lastname . ', ' . $client->name }}</li>
      <li>Teléfono: {{ $client->phone }}</li>
      <li>Dirección: {{ $client->address }}</li>
    </ul>
  </div>
  <div class="col-12 col-md-5 mx-auto">
    <table class="table table-borderless col-11 col-md-4 text-shadow" style="color:white;">
      <thead>
        @if (count($order->products))
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
          </tr>
        @endif  
      </thead>
      <tbody>
        <?php $total = 0; ?>
        <?php $i = 1; ?>
        @if (isset($order->products))
          @foreach( $order->products as $product )
            <tr>
              <th scope="row">{{ $i }}</th>
              <td>{{ $product->name }}</td>
              <td>{{ $product->pivot['quantity'] .'x ' . $product->get_unit( $product->unit, $product->pivot['quantity']) }}</td>
              <td>$ {{ $order->productSubtotal($product->id) }}</td>
            </tr>
            <?php $total += $order->productSubtotal($product->id) ?>
            <?php $i++; ?>
          @endforeach
        @endif
        @if (count($order->promotions))
          @php
            $j = 1;
          @endphp  
          <th colspan="4"><hr class="my-4"></th>
          <tr>
            <th>#</th>
            <th>Promoción</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
          @foreach ($order->promotions as $promotion )
            <tr>
              <th scope="row">{{ $j }}</th>
              <th>{{ $promotion->name }}</th>
              <th>{{ $promotion->pivot['quantity'] }} un.</th>
              <td>$ {{ $order->promotionSubtotal($promotion->id) }}</td>
            </tr>
            @php
              $j++;
              $total += $order->promotionSubtotal($promotion->id);
            @endphp
          @endforeach
        @endif
        </tbody>
    </table>
      <div class="row col-5 mx-auto py-auto">
        <div class="text-center text-shadow total">
          <h4>Total: ${{  $total }}</h4>
        </div>
      </div>
      <p class=" h3 text-center text-shadow">{{ $order->deliverDate() }}</p>
      <div class="row col-6 mx-auto text-center download-pdf">
        <div class="text-shadow">
          <a href="{{ URL::to('orders/pdf/' . $order->id) }}">
            <label for="">Descargar pedido</label>
          </a>
        </div>
      </div>
  </div>
  <div class="delivery-info">
    <div class="row">
      <div class="col-11 col-md-6 text-shadow mx-auto text-center">
        <p>Ante cualquier problema o duda por favor de contactarse <span>+54 9 3816 16-3996</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-11 col-md-6 entregas text-shadow mx-auto text-center" style="color: white;">
        <p>Las entregas se realizan los días Lunes, Miércoles y Viernes entre las 11:00hs y 14:00hs</p>
        <p>Únicamente para Yerba Buena</p>
      </div>
    </div>
  </div>

@endsection

