@extends('admin.navbar')
@section('menu')

<div class="row mt-3 mb-3">
    <div class="col-12 margin-tb">
        <div class="pull-left text-shadow">
            <h2 class="h1 mb-1">Nueva promoción</h2>
        </div>
    </div>
</div>

<div class="row col-12" id="categories" >
    <div class="form-group text-center categories">
        <button class="col-3 btn btn-edit btn-category mx-2 my-2 text-shadow" style="color:white; background: transparent;" onclick="selectCategory('Todos')">Todos</button>
        @foreach ($categories as $category)
            <button class="col-3 btn btn-edit btn-category mx-2 my-2 text-shadow" style="color:white; background: transparent;" id="" onclick="selectCategory('{{ $category->name }}')">{{ $category->name }}</button>
        @endforeach
    </div>
</div>
<form action="{{ route('promotions.create') }}" method="get">
    <div class="card-body p-5 mt-4">
        <h2 class="h4 mb-1">Productos</h2>
        <p class="small font-italic mb-4">Elija los productos que incluirá la promoción</p>
        <hr>
        <ul class="list-group" style="box-shadow: 5px 3px 20px 0px #0000004f;">
            @foreach ($products as $product)
                <li class="list-group-item rounded-0" id="{{ $product->getCategory() }}" style="padding: 10px;">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="{{ $product->id }}" type="checkbox" onchange='handleCheckProduct(this);'>
                        <label class="cursor-pointer font-italic custom-control-label" style="" for="{{ $product->id }}">{{ $product->name }}</label>
                        <input type="hidden" name="products[]" id="submit_{{ $product->id }}" value="{{ $product->id }}" disabled>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="form-group col-11 text-center">
        <input type="submit" class="btn btn-confirm "  value="Siguiente">
    </div>
</form>


<script src="{{ URL::asset('js/app.js') }}"></script>
@endsection