@extends('admin.navbar')

@section('menu')
    @if (\Session::has('success'))
        <div class="alert alert-success col-10 mx-auto text-center">
            {!! \Session::get('success') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-11">
            <h2 class="display-5">Pedido # {{ $order->id }}</h2>
        </div>
    <div>
      <hr>
    <div class="row p-2 m-2 mb-4 client-info2" style="">
      <i class="fa fa-address-card fa-2x mb-2"><span class="align-middle"> {{ $order->user->fullname() }}</span></i>
      <ul style="list-style-type: none">
          <li>Teléfono: {{ $order->user->phone }}</li>
          <li>Dirección: {{ $order->user->address }}</li>
      </ul>
    </div>
    <div class="col-12 col-md-5 mx-auto">
        <table class="table table-borderless col-11 col-md-4 text-shadow" style="color:white; font-size: 2.2vh;">
            <thead>
            <tr style="font-size: 2.5vh">
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

                    <td>{{ $product->pivot['quantity'] .' ' . $product->get_unit($product->unit, $product->pivot['quantity']) }}</td>

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
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 row justify-content-center text-center btn-orders" style="background: rgba(201, 203, 204, 0.54); padding: 2vh; margin: 15px; border-radius: 8px;">
                <div class="col-4">
                    <a class="btn btn-edit" href="{{ route('admin.orders.index') }}" style="background: #1d7baa;"> <i class="fas fa-arrow-circle-left fa-2x" style="background: #1d7baa; color: white;"></i> </a>
                </div>
                <div class="col-4">
                    <a class="btn btn-edit" href="{{ URL::to('orders/pdf/' . $order->id) }}" onclick="enable_edit()" style="background: #19926e;"> <i class="fas fa-download fa-2x" style="background: #19926e; color: white;"></i></a>
                </div>
                <div class="col-4">
                    {!! Form::open(array('route' => array('orders.destroy', $order->id ))) !!}
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-edit" style="background: #dc3545;" onclick="return confirm('¿Eliminar pedido {{ $order->id }}?')" ><i class="fas fa-trash-alt fa-2x" style="background: #dc3545; color: white;"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection
