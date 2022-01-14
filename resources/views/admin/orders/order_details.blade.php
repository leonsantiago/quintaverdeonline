<table class="table table-borderless col-md-4 text-shadow" style="color:white; font-size: 15px;">
  @if (count($order->products))
    <thead>
      <tr style="font-size: 2.5vh">
          <th scope="col">#</th>
          <th scope="col">Producto</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Subtotal</th>
      </tr>
    </thead>
  @endif
  <tbody>
  <?php $total = 0; ?>
  @if (count($order->products))
    <?php $i = 1; ?>
    @foreach( $order->products as $product )
        <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $product->name }}</td>

            <td>{{ $product->pivot['quantity'] .' ' . $product->get_unit($product->unit, $product->pivot['quantity']) }}</td>

            <td>$ {{ $order->productSubtotal($product->id) }}</td>

        </tr>
        <?php $total += $order->productSubtotal($product->id) ?>
        <?php $i++; ?>
    @endforeach
  @endif
  @if (count($order->promotions))
    @php
      $j = 1;
    @endphp  
    <th colspan="4"><hr class="my-4"></th>
    <tr>
      <th>#</th>
      <th>Promoción</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
    </tr>
    @foreach ($order->promotions as $promotion )
      <tr>
        <th scope="row">{{ $j }}</th>
        <th>{{ $promotion->name }}</th>
        <th>{{ $promotion->pivot['quantity'] }} un.</th>
        <td>$ {{ $order->promotionSubtotal($promotion->id) }}</td>
      </tr>
      @php
        $j++;
        $total += $order->promotionSubtotal($promotion->id);
      @endphp
    @endforeach
  @endif
  </tbody>
</table>
<div class="row col-8 col-md-4 mx-auto">
  <div class="text-center text-shadow total">
      <h4>Total: ${{  $total }}</h4>
  </div>
</div>