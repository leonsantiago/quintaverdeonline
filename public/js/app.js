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

/*function notSubmit(){
    let elements = document.querySelector('input[value][type="number"]')
    elements.forEach(el =>{
        console.log(el);
        el.disabled = true;
    });
}*/
/*$('#products').submit(function () {
    elements = document.querySelector('input[value][type="number"]')
    elements.forEach(el =>{
        console.log(el);
       el.disabled = true;
    });


    return true; // return false to cancel form action
});*/
