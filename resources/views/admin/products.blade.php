@extends('admin.navbar')
@section('menu')

    <div class="row">
        <div class="col-12 margin-tb">
            <div class="pull-left">
                <h2>Productos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"><i class="fa fa-plus-square"></i> Nuevo</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('errors'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped product-table">
        <thead>
            <tr>
                <th>#</th>
                <th></th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <?php $i = 0 ?>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img class="img-thumbnail" src="/image/{{ $product->image }}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td><a class="btn" href="{{ route('products.show', $product->id) }}" style="color: black;"><i class="fa fa-cog"></i> </a></td>
            </tr>
        @endforeach
    </table>

@endsection
