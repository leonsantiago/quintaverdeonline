<div class="modal fade" id="promotion_{{ $promotion->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ $promotion->name }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row text-center">
          <p>{{ $promotion->description }}</p>
        </div>
        <table class="table table-borderless" style="color: white;">
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
    </div>
  </div>
</div>