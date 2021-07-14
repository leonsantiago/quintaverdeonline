@if (count($products))
  <th colspan="4"><hr class="my-4"></th>
@endif
@php
  $j = 1;
@endphp
<tr>
  <th>#</th>
  <th>Promoción</th>
  <th>Cantidad</th>
  <th>Subtotal</th>
</tr>
@foreach ($promotions as $promotion)
  <tr>
    <th scope="row">{{ $j }}</th>
    <td>{{ $promotion->name }}</td>
    <td>{{ $promotion_quantities[$promotion->id] }} un.</td>
    <td>${{ number_format(($promotion->price) * ($promotion_quantities[$promotion->id]),2, ',', '.') }}</td>
  </tr>
  <input type="hidden" name="promotions[{{ $j }}]" value="{{ $promotion->id }}">
  <input type="hidden" name="promotions_quantity[{{ $j }}]" value="{{ $promotion_quantities[$promotion->id] }}">
    <?php $j++;  ?>
  
@endforeach