@extends('index')

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success col-10 mx-auto text-center">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <form action="{{ route('products/index') }}">
        <div class="table-responsive col-11 col-md-5 mx-auto">
            <table class="table col-11 col-md-4 text-shadow" style="color:white;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>
                <?php $i = 1; ?>
                @foreach( $order->products as $product )
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $product->name }}</td>

                        <td>{{ $product->pivot['quantity'] }}</td>

                        <td>$ {{ $order->subtotal($product->id) }}</td>

                    </tr>
                    <?php $total += $order->subtotal($product->id) ?>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            <div class="row col-5 mx-auto">
                <div class="text-center text-shadow total">
                    <h4>Total: ${{  $total }}</h4>
                </div>
            </div>
            <input type="hidden" id="url" value={{ 'http://127.0.0.1:8000/' }}>
        </div>
    </form>
@endsection


<script>
    let gourl = ('#url').value;

    if( window.history.replaceState ) {

        console.log('entro');
    }

</script>
