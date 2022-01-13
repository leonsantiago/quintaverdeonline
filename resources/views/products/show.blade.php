@extends('admin.navbar')
@section('menu')

    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin: 2vh 0vh">
            <div class="pull-left text-shadow">
                <h2>{{ $product->name }}</h2>
                <hr>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
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
            {!! Form::open(array('route' => array('products.update', $product->id ), 'files' => true)) !!}
                @csrf
                @method('PUT')
            <div class="d-flex justify-content-center">
                <div class="row col-11 col-md-6 d-flex justify-content-center text-shadow product-show">
                    <div class="row  justify-content-center">
                        <div class="col-10">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{ $product->name }}" disabled required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-4">
                            <div class="form-group">
                                <strong>Precio: $</strong>
                                <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-control" placeholder="Precio" disabled>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-3">
                                <div class="form-group">
                                    <strong>Categoria:</strong>
                                    <select class="form-select form-select-sm" aria-label=".form-select-lg example" name="category_id" id="category"  disabled required>
                                        @foreach($categories as $category)
                                            <option class="text-center" value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-10 col-md-4">
                                <div class="form-group">
                                    <strong>Unidad: </strong>
                                    <select name="unit" id="unit" class="form-select form-select-sm" disabled>
                                        @foreach( \App\Models\Product::UNIT_TYPE as $unit)
                                            <option value="{{ $unit }}" @if ($product->unit == $unit ) selected @endif> {{ ucfirst($unit) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-4 col-md-3 text-center">
                            <strong>Stock</strong>
                            <select name="active" id="active" class="form-select form-select-sm" disabled>
                                <option value="1" @if ($product->active == 1) selected @endif>Si</option>
                                <option value="0" @if ($product->active == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-10 col-md-6">
                            <div class="form-group">
                                <strong>Imagen:</strong>
                                @if (isset($product->image))
                                    <img class="img-thumbnail" src="/image/{{ $product->image }}" width="300px">
                                @else
                                    <p>No hay imagen asignada</p>
                                @endif
                                <div class="row">
                                    <input type="file" name="image" id="image" class="form-control" placeholder="image" style="margin: 2vh;" hidden disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" id="btn-save" style="margin: 2vh 1vh" hidden disabled><i class="far fa-save"></i> Guardar</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

            <div class="row justify-content-center text-center" style="margin-top: 2vh;">
                <div class="col-4">
                    <a class="btn btn-edit" href="#" onclick="enable_edit()"> <i class="fas fa-edit"></i> Editar</a>
                </div>
                <div class="col-4">
                    <a class="btn btn-edit" href="{{ route('admin.products') }}"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                </div>
                <div class="col-4">
                    {!! Form::open(array('route' => array('products.destroy', $product->id ))) !!}
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-edit" onclick="return confirm('¿Está seguro de eliminar {{ $product->name }}?')" ><i class="fas fa-trash-alt"></i> Borrar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <script>

            function enable_edit(){
                document.getElementById('name').removeAttribute("disabled")
                document.getElementById('category').removeAttribute("disabled")
                document.getElementById('image').removeAttribute("disabled")
                document.getElementById('image').removeAttribute("hidden")
                document.getElementById('price').removeAttribute("disabled")
                document.getElementById('unit').removeAttribute("disabled")
                document.getElementById('active').removeAttribute("disabled")
                document.getElementById('btn-save').removeAttribute("hidden")
                document.getElementById('btn-save').removeAttribute("disabled")
            }
        </script>

@endsection
