@extends('admin.navbar')
@section('menu')

    <h2>Pedidos</h2>

    <form action="{{ route('admin.orders.index') }}" method="GET" >
      <div class="row text-center mx-auto">
          <div class="col-6 col-md-2">
              <label for="">Desde</label>
              <input type="date" class="form-control" name="initial_date" id="initial_date" value="" required>
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
    <table class="table table-striped product-table">
        <thead>
        <tr>
            <th>N°</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th></th>
        </tr>
        </thead>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->fullname() }}</td>
                <td>{{ $order->get_date() }}</td>
                <td><a class="btn" href="{{ route('admin.orders.show', $order->id) }}" style="color: black;"><i class="fa fa-cog"></i> </a></td>
            </tr>
        @endforeach
    </table>
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
