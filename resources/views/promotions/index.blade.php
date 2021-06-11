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

<div class="list-promotions mt-5">
    <div class="row">
        @foreach ($promotions as $promotion)
        <div class="col-6 col-md-2">
            <button type="button" class="btn p-3 mb-3" data-bs-toggle="modal" data-bs-target="#promotion_{{ $promotion->id }}" style="background: white;">
                @if (isset($promotion->image))
                    <img class="img-thumbnail mx-auto d-block" src="/image/promotions/{{ $promotion->image }}" style="height: 80px !important; width: 150px !important">
                @else
                    <p>No hay imagen asignada</p>
                @endif
                {{ $promotion->name }}
            </button>
        </div>
        @include('promotions/show', ['title' => $promotion->name])
        @endforeach
    </div>

</div>




@endsection