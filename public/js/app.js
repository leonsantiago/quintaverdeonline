function increaseValue(product_id_unit) {

    var product = product_id_unit.split("_");
    console.log(product);
    var value = parseFloat(document.getElementById(product[0] + '_quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    if (product[1] === 'kg'){
        value += 0.5;
    } else{
        value++;
    }
    document.getElementById(product[0] + '_quantity').value = value;
}

function decreaseValue(product_id_unit) {
    var product = product_id_unit.split("_");
    var value = parseFloat(document.getElementById(product[0] + '_quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 0 ? value = 0 : '';

    if (product[1] === 'kg'){
        if (document.getElementById(product[0] + '_quantity').value > 0) {
            value -= 0.5;
        }
    }else{
        if (document.getElementById(product[0] + '_quantity').value > 0) {
            value--;
        }
    }
    document.getElementById(product[0] + '_quantity').value = value;
    if (document.getElementById(product[0] + '_quantity').value === 0) {
        document.getElementById(product[0] + '_quantity').value = '';
    }
}
