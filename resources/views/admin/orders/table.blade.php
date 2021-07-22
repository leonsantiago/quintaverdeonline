<table class="table table-striped product-table">
  <thead>
  <tr>
      <th>N°</th>
      <th>Cliente</th>
      <th>Fecha</th>
      <th></th>
  </tr>
  </thead>
  @foreach ($orders as $order)
      <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->user->fullname() }}</td>
          <td>{{ $order->get_date() }}</td>
          <td><a class="btn" href="{{ route('admin.orders.show', $order->id) }}" style="color: black;"><i class="fas fa-eye"></i> </a></td>
      </tr>
  @endforeach
</table>