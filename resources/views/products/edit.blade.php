@extends('admin.navbar')
@section('menu')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.products') }}"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hubo algun problema con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.edit') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="row justify-content-center">
            <div class="row  justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $product->name  }}" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-3">
                    <div class="form-group">
                        <strong>Categoria:</strong>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" name="category" id="category"  required>
                            <option selected>{{ $product->category_name() }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-10 col-md-4">
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        @if(isset($product->image))
                            <img src="/image/{{ $product->image }}" width="100px">
                        @else
                            <input type="file" name="image" class="form-control" placeholder="image">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-10 col-md-3">
                    <div class="form-group">
                        <string>Precio: </string>
                        <input type="number" name="price" class="form-control" placeholder="Precio" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="col-10 col-md-3">
                    <div class="form-group">
                        <strong>Unidad: </strong>
                        <select name="unit" id="unit" class="form-select form-select-sm">
                            <option selected>{{ $product->unit }}</option>
                            @foreach( \App\Models\Product::UNIT_TYPE as $unit)
                                <option value="{{ $unit }}"> {{ ucfirst($unit) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-10 col-md-3">
                    <label class="switch"> ¿En stock?
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="far fa-save"> Guardar</i></button>
            </div>
        </div>

    </form>


@endsection
