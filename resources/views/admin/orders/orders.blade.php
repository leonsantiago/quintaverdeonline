@extends('admin.navbar')
@section('menu')

<div class="col-4">
  <h2 class="text-shadow">Pedidos</h2>
</div>  
<form action="{{ route('admin.orders.index') }}" method="GET" >
  <div class="row text-center mx-auto">
      <div class="col-6 col-md-2">
          <label for="">Desde</label>
          <input type="date" class="form-control" name="initial_date" id="initial_date" value="" placeholder="dd-mm-yyyy" min="1990-01-01" max="2035-12-31"required>
      </div>
      <div class="col-6 col-md-2">
          <label for="">Hasta</label>
          <input type="date" class="form-control" name="end_date" id="end_date" value="" required>
      </div>
      <div class="row col-3 col-md-2 mx-auto">
          <button type="submit" class="btn btn-edit" style="margin: 2vh 1vh;">Filtrar</button>
      </div>
  </div>
</form>
<span style="float: right;">Resultado: {{ count($orders) }} pedidos</span>

@include('admin.orders.table')

<div class="row justify-content-center">
    <div class="col-4">
        <form action="{{ route('admin.orders.print') }}" method="POST">
            @csrf
            @foreach($orders as $order)
                <input type="hidden" name="orders[]" value="{{ $order->id }}">
            @endforeach
            <button type="submit" class="btn btn-edit"><i class="fas fa-download" style="">  Imprimir</i></button>
        </form>
    </div>
    <div class="col-4">
        <form action="{{ route('admin.shopping') }}" method="POST">
            @csrf
            @foreach($orders as $order)
                <input type="hidden" name="orders[]" value="{{ $order->id }}">
            @endforeach
            <button type="submit" class="btn btn-edit"><i class="fas fa-cart-arrow-down" style="">  Compras</i></button>
        </form>
    </div>

</div>

@endsection
