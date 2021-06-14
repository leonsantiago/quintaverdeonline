@extends('index')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('orders.store') }}">
        @csrf
        <div class="col-12 col-md-5 mx-auto">
            <table class="table table-borderless align-middle col-12 col-md-4 text-shadow" style="color:white;">
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
                @foreach( $products as $product )
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $product->name }}</td>

                    <td>{{ $quantity[$product->id] . ' x ' . $product->get_unit( $product->unit, $quantity[$product->id]) }}</td>

                    <td>$ {{ ($product->price * $quantity[$product->id]) }}</td>

                </tr>
                <input type="hidden" name="products[{{ $i }}]" value="{{ $product->id }}">
                <input type="hidden" name="quantity[{{ $i }}]" value="{{ $quantity[$product->id] }}">
                    <?php $total += ($product->price * $quantity[$product->id]) ?>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            <div class="row col-5 mx-auto">
                <div class="text-center text-shadow total">
                    <h4 class="my-auto">Total: $ {{  $total }}</h4>
                    <input type="hidden" name="total" id="total" value="{{ $total }}">
                </div>
            </div>
        </div>
        <div class="row col-md-4 mx-auto justify-content-around text-center" style="margin: 2vh 1vh;">
            <div class="col-5">
                <button type="button" class="btn btn-edit" onclick= "window.history.back();">Modificar</button>
            </div>
            <div class="col-5">
                <button type="button" class="btn btn-continue" onclick="showPaymentInfo()">Continuar</button>
            </div>
        </div>

        {{--PAYMENT SECTION--}}

        <div class="col-12 col-md-6 mx-auto payment-info text-center text-shadow" id="payment-info" style="display: none" >
            <p class="text-shadow h4">Método de pago</p>
            <div class="row justify-content-around">
                <div class="form-check form-check-inline col-4 payment-type">
                        <label class="form-check-label" for="transfer">
                            <input class="form-check-input" type="radio" name="payment_type" id="transfer" value="transferencia" required >
                            <span>Transferencia</span>
                        </label>
                </div>
                <div class="form-check form-check-inline col-4 payment-type justify-content-between">
                        <label class="form-check-label text-align-center" for="cash">
                            <input class="form-check-input" type="radio" name="payment_type" id="cash" value="efectivo">
                            <span>Efectivo</span>
                        </label>
                </div>
            </div>

            {{--CLIENT SECTION--}}
            <div class="row justify-content-center client-info">
                <p class="h4 text-shadow">Ingrese sus datos</p>
                <div class="form-group col-11">
                    <label class="text-shadow" for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group col-11">
                    <label class="text-shadow" for="lastname">Apellido</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" required>
                </div>
                <div class="form-group col-11">
                    <label class="text-shadow" for="phone">Celular</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="381 5859123" required>
                </div>
                <div class="form-group col-11">
                    <label class="text-shadow" for="address">Dirección</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Frias Silva 111 2A, Yerba Buena" required>
                </div>
                <div class="form-group col-11">
                    <input type="submit" class="btn btn-confirm "  value="Confirmar pedido">
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-11 col-md-6 deliveries text-shadow mx-auto text-center" style="color: white;">
            <p>Las entregas se realizan los días Lunes, Miércoles y Viernes entre las 11:00hs y 14:00hs</p>
            <p>Únicamente para Yerba Buena</p>
        </div>
    </div>



@endsection

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function validateMinimum() {

        let ok = true;
        let msg = "El valor mínimo del pedido debe ser de $500.";
        let total = document.getElementById("total");
        if (total < 500){
            ok = false;
            total.style.visibility = "visible";
            total.focus();
        }
        return ok;
    }

    $(document).ready(function(){
        $(".payment-info").hide('fast');
    })
    function showPaymentInfo(){
        $(".payment-info").show('fast');
    }

</script>

