<div id="{{ $product->getCategory()}}" class="col-11 col-md-2 align-middle product">
  <?php $img_url = '/images/' . strtolower( $product->name ) . '.jpg' ?>
  <div class="product-image">
    <img src="/image/{{ $product->image }}" alt="" class="mx-auto d-block rounded-circle">
  </div>
  <div class="row well product-info text-center">
    <h4>{{ $product->name }}</h4>
    <h6>$ {{ $product->price }} por {{ $product->unit }}</h6>
  </div>
  <div class="row">
    <?php  $product_id_unit = $product->id . '_' . $product->unit ?>
    <div class="btn-group col-10 mx-auto justify-content-around text-center" role="group">
      <div class="col-4" id="decrease" onclick="decreaseValue('{{ $product_id_unit }}')" value="Decrease Value">
        <button type="button" class="btn btn-increase rounded-circle" style="min-width: 38px;" >-</button>
      </div>
      <div class="col-6">
        <div class="text-center">
          @if($product->unit == 'kg')
            <input id="{{ $product->id }}_quantity" class="form-control text-center quantity" name="quantity[{{ $product->id }}]" type="number" min="0" max="20" step="0.5" placeholder="0.0" disabled="true" value="{{ old('quantity[$product->id]') }}" style="text-align: center;" onkeydown="return false">
          @else
            <input id="{{ $product->id }}_quantity" class="form-control text-center quantity" name="quantity[{{ $product->id }}]" type="number" min="0" max="20" placeholder="0.0" disabled="true" value="" style="text-align: center;" onkeydown="return false">
          @endif
            <input type="hidden" id="{{ $product->id }}_product" name="products[{{ $product->id }}]" value="{{ $product->id }}" disabled="true">
        </div>
      </div>
      <div class="col-4" id="increase" onclick="increaseValue('{{ $product_id_unit }}')" value="Increase Value">
        <button type="button" class="btn btn-increase rounded-circle" style="min-width: 38px;">+</button>
      </div>
    </div>
  </div>
</div>