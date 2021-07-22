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
        @include('admin.orders.order_details')
        
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 row justify-content-center text-center btn-orders" style="background: rgba(201, 203, 204, 0.54); padding: 2vh; margin: 15px; border-radius: 8px;">
                <div class="col-4">
                    <a class="btn btn-edit" href="{{ route('admin.orders.index') }}" style="background: #19926e;"> <i class="fas fa-arrow-circle-left fa-2x" style="color: white;"></i> </a>
                </div>
                <div class="col-4">
                    <a class="btn btn-edit" href="{{ URL::to('orders/pdf/' . $order->id) }}" onclick="enable_edit()" style="background: #19926e;"> <i class="fas fa-download fa-2x" style="color: white;"></i></a>
                </div>
                <div class="col-4">
                    {!! Form::open(array('route' => array('orders.destroy', $order->id ))) !!}
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-edit" style="background: #dc3545;" onclick="return confirm('¿Eliminar pedido {{ $order->id }}?')" ><i class="fas fa-trash-alt fa-2x" style="color: white;"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection
