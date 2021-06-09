@extends('admin.navbar')
@section('menu')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-12 margin-tb">
        <div class="pull-left">
            <h2 class="h2 text-shadow"> Nueva promoción</h2>
        </div>
    </div>
</div>

<form action="{{ route('promotions.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row client-info">
        <div class="form-group col-11">
            <label class="text-shadow" for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group col-11">
            <label class="text-shadow" for="description">Descripción</label>
            <textarea class="form-control" name="description" id="description" cols="" rows="3" placeholder="Breve descripción de la promoción"></textarea>
        </div>
        <div class="form-group col-11">
            <label class="text-shadow" for="description">Imagen</label>
            <input type="file" name="image" class="form-control" placeholder="image">
        </div>
        <div class="row col-11 mx-auto products-details p-2 m-3">
            <h2 class="h5 text-shadow">Productos</h2>
            @foreach ($products as $product)
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width: 50% !important;">{{ $product->name }}</span>
                    <input type="number" name="quantity[{{ $product->id}}]" class="form-control" placeholder="Cantidad en {{ $product->unit }}" required>
                </div>
                <input type="hidden" name="products[]" value="{{ $product->id }}">
            @endforeach
        </div>
        <div class="form-group text-center">
            <label for="active">¿Hay stock?</label>
            <input type="checkbox" name="active" value="true">
        </div>
        <div class="row col-8 mx-auto mt-3">
            <div class="input-group">
                <span class="input-group-text">Precio: </span>
                <input type="number" name="price" class="form-control pull-left" placeholder="$ " style="width: 30% !important;" >
            </div>
        </div>  
        <div class="form-group col-11 text-center">
            <input type="submit" class="btn btn-confirm "  value="Guardar">
        </div>
    </div>
</form>

@endsection