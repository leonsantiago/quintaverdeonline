@extends('admin.navbar')
@section('menu')

<div class="form-group">
    @if (isset($promotion->image))
        <img class="img-thumbnail mx-auto d-block" src="/image/promotions/{{ $promotion->image }}" width="150px">
    @else
        <p>No hay imagen asignada</p>
    @endif
</div>
<div class="row text-center">
    <h2 class="h3">Precio: ${{ $promotion->price }}</h2>
</div>
<div class="row text-center">
    <p>{{ $promotion->description }}</p>
</div>
    <table class="table table-striped product-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <?php $i = 0 ?>
        @foreach ($promotion->products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot['quantity'] . " " . $product->get_unit()  }}</td>
            </tr>
        @endforeach
    </table>
<div class="row">
    <div class="col-6 col-md-2 mx-auto">
        <button type="button" class="btn p-3 mb-3" data-bs-toggle="modal" data-bs-target="#products" style="background: white;">
            Productos
        </button>
    </div>
</div>
@include('promotions.products')
@endsection
