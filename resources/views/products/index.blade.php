@extends('index')


@section('content')


    <div class="row">
        <div class="col-11 modal-header text-center tittle mx-auto">
            <h2 class="col-11 modal-title w-100 text-shadow">
                Productos de la A a la Z
            </h2>
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
    <form id="products" method="get" action="{{ route('orders.create') }}">
        @csrf

        <div class="row col-10 col-md-12 mx-auto">
            @foreach( $products as $product )

                <div id="{{ $product->getCategory()}}" class="col-11 col-md-2 align-middle text-shadow product">
                    <?php $img_url = '/images/' . strtolower( $product->name ) . '.jpg' ?>
                    <div class="product-image">
                        <img src="/image/{{ $product->image }}" alt="" class="mx-auto d-block rounded-circle">
                    </div>
                    <div class="row well product-info text-shadow text-center">
                        <h4>{{ $product->name }}</h4>
                        <h6>$ {{ $product->price }} por {{ $product->unit }}</h6>
                    </div>

                    <div class="row">
                        <?php  $product_id_unit = $product->id . '_' . $product->unit ?>
                        <div class="btn-group col-10 mx-auto justify-content-around text-center" role="group">

                            <div class="col-3"id="decrease" onclick="decreaseValue('{{ $product_id_unit }}')" value="Decrease Value">
                                <button type="button" class="btn btn-danger rounded-circle" style="min-width: 38px;" >-</button>
                            </div>
                            <div class="col-4">
                                <div class="text-center">
                                    @if($product->unit == 'kg')
                                        <input id="{{ $product->id }}_quantity" class="form-control text-center quantity" name="quantity[{{ $product->id }}]" type="number" min="0" max="20" step="0.5" placeholder="0.0" disabled="true" value="{{ old('quantity[$product->id]') }}" style="text-align: center;" onkeydown="return false">
                                    @else
                                        <input id="{{ $product->id }}_quantity" class="form-control text-center quantity" name="quantity[{{ $product->id }}]" type="number" min="0" max="20" placeholder="0.0" disabled="true" value="" style="text-align: center;" onkeydown="return false">
                                    @endif
                                        <input type="hidden" id="{{ $product->id }}_product" name="products[{{ $product->id }}]" value="{{ $product->id }}" disabled="true">
                                </div>
                            </div>
                            <div class="col-3" id="increase" onclick="increaseValue('{{ $product_id_unit }}')" value="Increase Value">
                                <button type="button" class="btn btn-success rounded-circle" style="min-width: 38px;">+</button>
                            </div>
                        </div>
                    </div>

                </div>

            @endforeach
        </div>

        <div class="row deliveries">
            <div class="col-12 text-center">
                <p> Las entregas se realizan los días Lunes, Miércoles y Viernes entre las 11:00hs y 14:00hs</p></b>
                <p>Únicamente para Yerba Buena</p>
            </div>
        </div>
        <div class="row text-center float-button">
            <div class="col-12 mx-auto">
                <div class="col-12 col-md-4 mx-auto fixed-bottom">
                    <input class="btn btn-edit btn-order text-shadow" name="ver_pedido" type="submit" value="Ver mi pedido" onclick="notSubmit()">
                </div>
            </div>
        </div>
    </form>

    <script src="{{ URL::asset('js/app.js') }}"></script>


@endsection
