<div id="promotions" class="col-11 col-md-2 align-middle product" >
  <div class="product-image">
      <img src="/image/promotions/{{ $promotion->image }}" alt="{{ $promotion->name }}" class="mx-auto d-block rounded-circle" data-bs-toggle="modal" data-bs-target="#promotion_{{ $promotion->id }}">
  </div>
  <div class="row well product-info text-center">
      <h4>{{ $promotion->name }}</h4>
      <h6>$ {{ $promotion->price }}</h6>
      <h6>*Toque la imágen para ver detalles</h5>
  </div>

  <div class="row">
      @php
          $promotion_index = 'promotion' .'_'. $promotion->id
      @endphp
      <div class="btn-group col-10 mx-auto justify-content-around text-center" role="group">
          <div class="col-4"id="decrease" onclick="promotionValue('{{ $promotion_index }}_decrease')" value="Decrease Value">
              <button type="button" class="btn btn-decrease rounded-circle" style="min-width: 38px;" >-</button>
          </div>
          <div class="col-6">
              <div class="text-center">
                <input id="{{ $promotion->id }}_promotion_quantity" class="form-control text-center quantity" name="promotion_quantity[{{ $promotion->id }}]" type="number" min="0" max="20" placeholder="0.0" disabled="true" value="" style="text-align: center;" onkeydown="return false">
                <input type="hidden" id="{{ $promotion->id }}_promotion" name="promotions[{{ $promotion->id }}]" value="{{ $promotion->id }}" min="0" disabled="true">
              </div>
          </div>
          <div class="col-4" id="increase" onclick="promotionValue('{{ $promotion_index }}_increase')" value="Increase Value">
              <button type="button" class="btn btn-increase rounded-circle" style="min-width: 38px;">+</button>
          </div>
      </div>
  </div>
</div>
@include('products.partials.promotion')
