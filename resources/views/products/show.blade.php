@extends('admin.navbar')
@section('menu')

    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin: 2vh 0vh">
            <div class="pull-left">
                <h2>{{ $product->name }}</h2>
            </div>
        </div>
    </div>

    @if (isset($success))
        <div class="alert alert-success">
            <ul>
                @foreach ($success->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="row justify-content-center">
            <div class="row  justify-content-center">
                <div class="col-10">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4" id="inputGroup-sizing-default">Nombre</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $product->name }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4" id="inputGroup-sizing-default">Categoria</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $product->category_name() }}" disabled>
                    </div>
                </div>
                <div class="col-10 col-md-4">
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        @if(isset($product->image))
                            <img src="/image/{{ $product->image }}" width="500px">
                        @else
                            No hay imagen asignada
                        @endif
                    </div>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-10 col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4" id="inputGroup-sizing-default">Precio: </span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01" value="$ {{ $product->price }}" disabled>
                    </div>
                </div>
                <div class="col-10 col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4" id="inputGroup-sizing-default">Unidad: </span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $product->unit }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4" id="inputGroup-sizing-default">Stock: </span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Si" disabled>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center" style="margin-top: 2vh;">
                <div class="col-6">
                    <form action="GET">
                        <a class="btn btn-edit" href="{{ route('product.show', $product->id) }}"> <i class="fas fa-edit"></i> Editar</a>
                    </form>
                </div>
                <div class="col-6">
                    <a class="btn btn-edit" href="{{ route('admin.products') }}"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                </div>
            </div>
        </div>



@endsection
