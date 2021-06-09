<div class="modal fade" id="products" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body p-5 mt-4">
                    <h2 class="h4 mb-1">Productos</h2>
                    <p class="small font-italic mb-4">Elija los productos que incluirá la promoción</p>
                    <hr>
                    <ul class="list-group" style="box-shadow: 5px 3px 20px 0px #0000004f;">
                        @foreach ($products as $product)
                        
                            <li class="list-group-item rounded-0" id="{{ $product->getCategory() }}" style="padding: 10px;">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="{{ $product->id }}" type="checkbox" onchange='handleCheckProduct(this);'>
                                    <label class="cursor-pointer font-italic custom-control-label" style="" for="{{ $product->id }}">{{ $product->name }}</label>
                                    <input type="hidden" name="products[]" id="submit_{{ $product->id }}" value="{{ $product->id }}" disabled>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a class="btn btn-primary" href=#> <i class="fa fa-edit"></i> Editar</a>
            </div>
        </div>
    </div>
  </div>