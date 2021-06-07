@extends('admin.navbar')
@section('menu')

<div class="row">
    <div class="col-12 margin-tb">
        <div class="pull-left">
            <h2>Promociones</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('promotions.new') }}"><i class="fa fa-plus-square"></i> Nueva</a>
        </div>
    </div>
</div>

@if ($message = Session::get('errors'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@elseif ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@foreach ($promotions as $promotion)
    <h2>{{ $promotion-> name }}</h2>
    @foreach ($promotion->products as $product)
        <h2 class="h5">{{ $product->name }}</h2>
        <h2 class="h5">{{ $product->pivot['quantity'] }}</h2>
    @endforeach
@endforeach




@endsection