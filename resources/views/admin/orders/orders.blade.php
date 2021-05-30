@extends('admin.navbar')
@section('menu')

    <h2>Pedidos</h2>

    {!! Form::open(array('route' => array('admin.orders.index'))) !!}
    @csrf
    @method('GET')
        <div class="row text-center">
            <div class="col-5">
                <label for="">Desde</label>
                <input type="date" name="initial_date">
            </div>
            <div class="col-4">
                <label for="">Hasta</label>
                <input type="date" name="end_date">
            </div>
        </div>
    <button type="submit">Filtrar</button>
    {!! Form::close() !!}
    <table class="table table-striped product-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <?php $i = 0 ?>
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->user->fullname() }}</td>
                <td>$ {{ $order->total }}</td>
                <td><a class="btn" href="{{ route('admin.orders.show', $order->id) }}" style="color: black;"><i class="fa fa-cog"></i> </a></td>
            </tr>
        @endforeach
    </table>

@endsection
