function promotionValue(promotion_index) {

    let promotion = promotion_index.split("_");
    let element = document.getElementById(promotion[1] + '_promotion_quantity');
    let promotion_ele = document.getElementById(promotion[1] + '_promotion');
    let value = parseFloat(element.value);
    value = isNaN(value) ? 0 : value;
    value < 0 ? value = 0 : '';
    if (promotion[2] === 'increase'){
        value++;
    }else{
        if (element.value > 0) {
            value--;
        }
    }
    element.value = value;
    if (element.value > 0){
        element.disabled = false;
        promotion_ele.disabled = false;
    }
}

function increaseValue(product_id_unit) {

    let product = product_id_unit.split("_");
    let element = document.getElementById(product[0] + '_quantity');
    let product_ele = document.getElementById(product[0] + '_product');
    let value = parseFloat(element.value);
    value = isNaN(value) ? 0 : value;
    if (product[1] === 'kg'){
        value += 0.5;
    } else{
        value++;
    }
    element.value = value;
    if (element.value > 0){
        element.disabled = false;
        product_ele.disabled = false;
    }
}

function decreaseValue(product_id_unit) {
    let product = product_id_unit.split("_");
    let element = document.getElementById(product[0] + '_quantity');
    let product_ele = document.getElementById(product[0] + '_product');
    let value = parseFloat(element.value);
    value = isNaN(value) ? 0 : value;
    value < 0 ? value = 0 : '';

    if (product[1] === 'kg'){
        if (element.value > 0) {
            value -= 0.5;
        }
    }else{
        if (element.value > 0) {
            value--;
        }
    }
    element.value = value;
    if (element.value > 0){
        element.disabled = false;
        product_ele.disabled = false;
    }
}

function selectCategory(category){
    console.log(category);
    switch (category) {
        case 'Promociones':
          jQuery('[id=Promociones]').fadeIn(200);
          jQuery('[id=Frutas]').fadeOut(200);
          jQuery("[id=Verduras]").fadeOut(200);
          jQuery("[id=Otros]").fadeOut(200);
          break;
        case 'Todos':
          jQuery('[id=Promociones]').fadeIn(200);
          jQuery('[id=Frutas]').fadeIn(200);
          jQuery("[id=Verduras]").fadeIn(200);
          jQuery("[id=Otros]").fadeIn(200);
          break;
        case 'Frutas':
          jQuery('[id=Promociones]').fadeOut(200);
          jQuery('[id=Frutas]').fadeIn(200);
          jQuery("[id=Verduras]").fadeOut(200);
          jQuery("[id=Otros]").fadeOut(200);
          break;
        case 'Verduras':
          jQuery('[id=Promociones]').fadeOut(200);
          jQuery('[id=Frutas]').fadeOut(200);
          jQuery("[id=Verduras]").fadeIn(200);
          jQuery("[id=Otros]").fadeOut(200);
          break;
        case 'Otros':
          jQuery('[id=Promociones]').fadeOut(200);
          jQuery('[id=Frutas]').fadeOut(200);
          jQuery("[id=Verduras]").fadeOut(200);
          jQuery("[id=Otros]").fadeIn(200);
          break;
        default:
            break;
    }

}

function handleCheckProduct(product){
    let id = $(product).attr("id");
    if( product.checked == true){
        $("#submit_" + id).attr('disabled', false);
    }else{
        $("#submit_" + id).attr('disabled', true);
    }
}
