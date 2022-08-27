import './bootstrap';

import './util';
import './main';
import { defaultsDeep } from 'lodash';

function setUniversalBeerPriceForBuyForm() {
    $('#flavor_selector select').change(e => {
        var compound = $(e.target).val().split(':');
        var price = compound[1];
        setUniversalBeerPrice($(e.target).parent().parent(), price);
        sumOrderTotal();

        
    });
    $('#flavor_selector .row').each((i, row) => {
        var compoundstr = $(row).find('select').val();
        if (compoundstr == undefined) return;
        var compound = $(row).find('select').val().split(':');
        var price = compound[1];
        setUniversalBeerPrice(row, price);
    });
    
    sumOrderTotal();
}

function setUniversalBeerPrice(row, price) {
    var name = $(row).find('label').html();
    $(row).find('span.subtotal').text("$ " + price);
}

function sumOrderTotal() {
    console.log("sumOrderTotal");
    var total = 0;
    $('#flavor_selector select').each( (i, element) => {
        var compound = $(element).val().split(':');
        var qty = parseInt(compound[0], 10);
        var subtotal = parseInt(compound[1], 10);
        setUniversalBeerPrice($(element).parent().parent(), subtotal);
        total += subtotal;
    });
    $('#flavor_selector span.total b').text("$ " + total);
}

$(document).ready(function() {

    if ($('#flavor_selector').length) {
        setUniversalBeerPriceForBuyForm();
        setTimeout(function() {
            sumOrderTotal();
        }, 500);
    };
});