let rate = Number($('#commission_rate').val());
let max_com = Number($('#max_commission').val());
let deposit;

if (window.location.href.includes('deposit')) {
    deposit = true
} else {
    deposit = false
}

$('#currency').on('change', function () {
    $('.rate').css('display', 'none');

    $('.' + this.value + '_rate').css('display', 'block');

    // if(this.value === 'gbp'){
    //     $('.rate').eq(1).css('display', 'block');
    //     $('.rate').eq(0).css('display', 'none');
    // }
    //  else if(this.value === 'usd'){
    //      $('.rate').eq(0).css('display', 'block');
    //      $('.rate').eq(1).css('display', 'none');
    //  }
    //  else{
    //
    //  }
    distribution(rate, max_com, deposit);
});

$('#requested_amount').on('change', function () {
    distribution(rate, max_com, deposit);
});

function distribution(multiplier, limit, deposit) {
    let exchange_rate = $('.' + $('#currency').val() + '_rate b').html();
    let result = calculate_commission(multiplier, limit, exchange_rate);
    let limit_multiplier = 1;
    if (exchange_rate) {
        limit_multiplier = limit_multiplier * exchange_rate
    }
    if (deposit) {
        display_deposit_rates(result, limit * limit_multiplier)
    } else {
        display_withdraw_rates(result, limit * limit_multiplier)
    }
}

function calculate_commission(multiplier, limit, exchange_rate) {
    let result = 0;
    if (exchange_rate) {
        result = (($('#requested_amount').val() * Number(exchange_rate)) * multiplier).toFixed(2);
    } else {
        result = (($('#requested_amount').val()) * multiplier).toFixed(2);
    }
    return result;
}

function display_deposit_rates(result, limit) {
    if (result >= limit) {
        $('#commission_fee').val((limit).toFixed(2));
        $('.commission_fee_disclaimer b').html((limit).toFixed(2) + " " + $('#currency').val());
    } else {
        $('#commission_fee').val(result);
        $('.commission_fee_disclaimer b').html((limit).toFixed(2) + " " + $('#currency').val());
    }
}

function display_withdraw_rates(result, limit) {
    if (result <= limit) {
        $('#commission_fee').val((limit).toFixed(2));
        $('.commission_fee_disclaimer b').html((limit).toFixed(2) + " " + $('#currency').val());
    } else {
        $('#commission_fee').val(result);
        $('.commission_fee_disclaimer b').html((limit).toFixed(2) + " " + $('#currency').val());
    }
}

$(document).ready(function(){
    setTimeout(function() {
        $("#errorMessage").slideUp('slow')
    }, 3000);
});