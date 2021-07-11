<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Producto</th>
    <th scope="col">Cantidad</th>
    <th scope="col">Subtotal</th>
  </tr>
</thead>
<tbody>
@foreach( $products as $product )
<tr>
  <th scope="row">{{ $i }}</th>
  <td>{{ $product->name }}</td>

  <td>{{ $quantity[$product->id] . ' x ' . $product->get_unit( $product->unit, $quantity[$product->id]) }}</td>

  <td>$ {{ ($product->price * $quantity[$product->id]) }}</td>
</tr>
<input type="hidden" name="products[{{ $i }}]" value="{{ $product->id }}">
<input type="hidden" name="quantity[{{ $i }}]" value="{{ $quantity[$product->id] }}">
  @php
    $total += ($product->price * $quantity[$product->id]);
    $i++;
  @endphp
@endforeach