@extends('admin.navbar')
@section('menu')


    {!! Form::open(array('route' => array('promotions.update', $promotion->id ), 'files' => true)) !!}
        @csrf
        @method('PUT')

    <div class="row">
        <div class="col-6">
            <h2 class="h2 text-shadow align-middle"><span class="align-middle">{{ $promotion->name }}</span></h2>
        </div>
        <div class="col-6">
            <div class="checkbox text-center">
                <input type="checkbox" name="active" data-toggle="toggle" data-on="Activa" data-off="No activa" data-onstyle="success" data-offstyle="danger" checked>
            </div>
        </div>
    </div>
    <hr>
    <div class="row client-info">
        <div class="form-group col-11">
            <label class="text-shadow" for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $promotion->name }}" required>
        </div>
        <div class="form-group col-11">
            <label class="text-shadow" for="description">Descripción</label>
            <textarea class="form-control" name="description" id="description" cols="" rows="3" placeholder="Breve descripción de la promoción">{{ $promotion->description }}</textarea>
        </div>
        <div class="form-group col-11">
            <div class="form-group">
                @if (isset($promotion->image))
                    <img class="img-thumbnail mx-auto d-block" src="/image/promotions/{{ $promotion->image }}" width="150px">
                @else
                    <p>No hay imagen asignada</p>
                @endif
            </div>
            <input type="file" name="image" class="form-control" placeholder="image">
        </div>
        
        <div class="row col-8 mx-auto mt-3">
            <div class="input-group">
                <span class="input-group-text">Precio $:</span>
                <input type="number" name="price" class="form-control pull-left" placeholder="$ " style="width: 30% !important;" value="{{ $promotion->price }}" >
            </div>
        </div>  
    </div>
    <div class="row text-center mt-3">
        <p>* Los productos no pueden ser modificados. De ser necesario deberá eliminar y crear una nueva promoción</p>
    </div>
    <div class="row text-center">
        <center>
            <div class="col-6 col-md-2 mt-3">
                <button type="submit" class="btn btn-edit">Guardar</button>  
            </div>
        </center>
    </div>
{!! Form::close() !!}



@endsection
