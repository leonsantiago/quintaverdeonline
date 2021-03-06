@extends('index')


@section('content')
  <div class="row">
    <div class="col-11 modal-header text-center tittle mx-auto">
      <h3 class="col-11 modal-title w-100 text-shadow">
        Productos de la A a la Z
        </h3>
    </div>
  </div>
  <div class="row col-12" id="categories" >
    <div class="form-group text-center categories">
      <button class="col-5 btn btn-category mx-2 my-2" onclick="selectCategory('Todos')">Todos</button>
      <button class="col-5 btn btn-category mx-2 my-2" onclick="selectCategory('Promociones')">Promociones</button>
      @foreach ($categories as $category)
        <button class="col-5 btn btn-category mx-2 my-2" id="" onclick="selectCategory('{{ $category->name }}')">{{ $category->name }}</button>
      @endforeach
    </div>
  </div>
  <form id="products" method="get" action="{{ route('orders.create') }}">
    @csrf
    <div class="row col-10 col-md-12 mx-auto" id="Promociones">
      @foreach ($promotions as $promotion)
        @include('products.partials.promotions')
      @endforeach
    </div>
    <div class="row col-10 col-md-12 mx-auto">
      @foreach( $products as $product )
        @include('products.partials.product')
      @endforeach
    </div>
    <div class="row deliveries">
      <div class="col-12 text-center">
        <p> Las entregas se realizan de Lunes a  Viernes solo por las mañanas.</p></b>
        <p>Únicamente para Yerba Buena</p>
        <p>Ante cualquier consulta comunicarse al: +54 381 212-8953</p>
      </div>
    </div>
    <div class="row text-center float-button">
      <div class="col-12 mx-auto">
        <div class="col-12 col-md-4 mx-auto fixed-bottom">
          <input class="btn btn-edit btn-order" name="ver_pedido" type="submit" value="Ver mi pedido" onclick="notSubmit()">
        </div>
      </div>
    </div>
  </form>
  <script src="{{ URL::asset('js/custom_app.js') }}"></script>
@endsection
