@extends('admin.navbar')
@section('menu')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-shadow">
            <h2>Nueva promoción</h2>
        </div>
    </div>
</div>

<form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- ... customer name and email fields --}}
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
        <div class="form-group col-11">
        <label class="text-shadow" for="description">Stock</label>
          <select name="active" id="active" class="form-select form-select-sm">
              <option value="1" >Stock disponible</option>
              <option value="0" >Sin stock</option>
          </select>
        </div>
        <!-- <div class="form-group text-center">
            <label for="active">¿Hay stock?</label>
            <input type="checkbox" name="active" value="true">
        </div> -->
        <div class="form-group col-11 ">
            <div class="input-group">
                <span class="input-group-text">Precio: </span>
                <input type="number" name="price" class="form-control pull-left" placeholder="$ " style="width: 30% !important;" >
            </div>
        </div>  
    </div>

    <hr>

    {{-- P R O D U C T S --}}


    <h2 class="h4 mt-4">Productos</h2>
    <table class="table table-striped product-table" id="products_table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr id="product0">
                <td>
                    <select name="products[]" class="form-control">
                        <option value="">-- seleccione --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }} (${{ number_format($product->price, 2) }})
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="quantities[]" class="form-control" value="1" />
                </td>
            </tr>
            <tr id="product1"></tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-12">
            <button id="add_row" class="btn btn-edit pull-left">+ Agregar</button>
            <button id='delete_row' class="pull-right btn btn-danger">- Eliminar</button>
        </div>
    </div>
    <div class="col-5 mx-auto mt-4">
        <div class="row text-center">
            <input name="save"class="btn btn-success" type="submit" value="Guardar">
        </div>
    </div>
</form>


<script>
     $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endsection