<div class="modal fade" id="promotion_{{ $promotion->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ $title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              @if (isset($promotion->image))
                  <img class="img-thumbnail mx-auto d-block" src="/image/promotions/{{ $promotion->image }}" width="150px">
              @else
                  <p>No hay imagen asignada</p>
              @endif
          </div>
          <div class="row text-center">
            <h2 class="h3">Precio: ${{ $promotion->price }}</h2>
          </div>
          <div class="row text-center">
            <p>{{ $promotion->description }}</p>
          </div>
          <table class="table table-striped product-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <?php $i = 0 ?>
            @foreach ($promotion->products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot['quantity'] . " " . $product->get_unit($product->unit, $product->pivot['quantity'])  }}</td>
                </tr>
            @endforeach
        </table>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <a class="btn btn-primary" href="{{ route('promotions.edit', $promotion->id) }}"> <i class="fa fa-edit"></i> Editar</a>
        </div>
      </div>
    </div>
  </div>