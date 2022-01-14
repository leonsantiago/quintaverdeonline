@extends('index')

@section('content')
  @if (\Session::has('success'))
    <div class="alert alert-success col-10 mx-auto text-center">
        {!! \Session::get('success') !!}
    </div>
  @endif
  <div class="row">
    <div class="col-11 text-center text-shadow">
      <h3>Pedido # {{ $order->id }}</h3>
    </div>
    <hr>
  </div>
  <div class="form-group" style="color: #5B7A5B">
    <ul>
      <li>Cliente: {{ $client->lastname . ', ' . $client->name }}</li>
      <li>Teléfono: {{ $client->phone }}</li>
      <li>Dirección: {{ $client->address }}</li>
    </ul>
  </div>
  <div class="col-12 col-md-12 mx-auto">
    <table class="table table-borderless align-middle col-12 col-md-12" style="color:white; font-size: 15px;">
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
              <td>${{ number_format($order->productSubtotal($product->id), 0, ',', '.') }}</td>
            </tr>
            <?php $total += $order->productSubtotal($product->id) ?>
            <?php $i++; ?>
            <th colspan="4"><hr class="my-1"></th>
          @endforeach
        @endif
        @if (count($order->promotions))
          @php
            $j = 1;
          @endphp  
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
              <td>${{number_format($order->promotionSubtotal($promotion->id),0, ',', '.') }}</td>
            </tr>
            @php
              $j++;
              $total += $order->promotionSubtotal($promotion->id);
            @endphp
          @endforeach
        @endif
        </tbody>
    </table>
      <div class="row col-8 col-md-5 mx-auto py-auto">
        <div class="text-center text-shadow total">
          <p>Total: ${{ number_format($total, 2, ',', '.') }}</p>
        </div>
      </div>
      <p class=" h4 text-center text-shadow">{{ $order->deliverDate() }}</p>
      <div class="row col-8 mx-auto text-center download-pdf">
        <div class="">
          <a href="{{ URL::to('orders/pdf/' . $order->id) }}">
            <label for="" style="font-size: 14px"><i class="fas fa-download m-1" style="background: transparent; color: white;"></i> Descargar pedido</label>
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
        <p>Las entregas se realizan de Lunes a  Viernes solo por las mañanas.</p>
        <p>Únicamente para Yerba Buena</p>
        <p>Ante cualquier consulta comunicarse al: +54 381 212-8953</p>
      </div>
    </div>
  </div>

@endsection

