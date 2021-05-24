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
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            <?php $i = 1; ?>
            @foreach( $order->products as $product )
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $product->name }}</td>

                    <td>{{ $product->pivot['quantity'] .'x ' . $product->get_unit() }}</td>

                    <td>$ {{ $order->subtotal($product->id) }}</td>

                </tr>
                <?php $total += $order->subtotal($product->id) ?>
                <?php $i++; ?>
            @endforeach
            </tbody>
        </table>
        <div class="row col-5 mx-auto">
            <div class="text-center text-shadow total">
                <h4>Total: ${{  $total }}</h4>
            </div>
        </div>
        <div class="row col-5 mx-auto text-center download-pdf">
            <div class="col-12 text-shadow">
                <a href="{{ URL::to('order/pdf/' . $order->id) }}">
                    <label for="">Descargar pedido</label>
                </a>
            </div>
        </div>
        <input type="hidden" id="url" value={{ 'http://127.0.0.1:8000/' }}>
    </div>
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

@endsection

