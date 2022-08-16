import './bootstrap';

import './util';
import './main';

function setUniversalBeerPriceForBuyForm() {
    var uprice = parseInt($("#universal_price").val(), 10);
    if (isNaN(uprice)) return;
    $('#flavor_selector select').change(e => {
        setUniversalBeerPrice($(e.target).parent().parent(), uprice);
        sumOrderTotal();
        
    });
    $('#flavor_selector .row').each((i, row) => {
        setUniversalBeerPrice(row, uprice);
    });
    
    sumOrderTotal();
}

function setUniversalBeerPrice(row, uprice) {
    var qty = parseInt($(row).find('select').val(), 10);
    var name = $(row).find('label').html();
    console.log(name, qty, uprice);
    $(row).find('span.subtotal').text("$ " + qty*uprice);
    $(row).find('input.subtotal').val(qty*uprice);
}

function sumOrderTotal() {
    var total = 0;
    console.log("sumOrderTotal");
    $('#flavor_selector input.subtotal').each( (i, element) => {
        console.log("sumOrderTotal",i, element);
        var subtotal = $(element).val();
        total += parseInt(subtotal,10);
    });
    console.log("sumOrderTotal", total);
    $('#flavor_selector span.total b').text("$ " + total);
    $('#flavor_selector input.total').val(total);
}

$(document).ready(function() {
    setUniversalBeerPriceForBuyForm();
});