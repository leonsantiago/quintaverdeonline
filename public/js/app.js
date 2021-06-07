function increaseValue(product_id_unit) {

    let product = product_id_unit.split("_");
    let element = document.getElementById(product[0] + '_quantity');
    let product_ele = document.getElementById(product[0] + '_product');
    console.log(product);
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
        case 'Todos':
                jQuery('[id=Frutas]').show();
                jQuery("[id=Verduras]").show();
                jQuery("[id=Otros]").show();
            break;
        case 'Frutas':
                jQuery('[id=Frutas]').show();
                jQuery("[id=Verduras]").hide();
                jQuery("[id=Otros]").hide();
            break;
        case 'Verduras':
                jQuery('[id=Frutas]').hide();
                jQuery("[id=Verduras]").show();
                jQuery("[id=Otros]").hide();
            break;
        case 'Otros':
                jQuery('[id=Frutas]').hide();
                jQuery("[id=Verduras]").hide();
                jQuery("[id=Otros]").show();
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