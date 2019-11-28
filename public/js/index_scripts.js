$(document).ready(function(){
    setTimeout(function() {
        $("#successMessage").slideUp('slow')
    }, 3000);
});

$('#selected_currency').on('change', function () {
    $.ajax({
        url: "http://lab.localhost/first_task/public/change_currency",
        data:  {currency:$(this).val()} ,
        success:function(data){
            let result = JSON.parse(data);
            $('.card-text b').html(result['balance'] + " " + result['currency'])
            $('#currency_symbol').removeClass('fa-usd')
            $('#currency_symbol').removeClass('fa-eur')
            $('#currency_symbol').removeClass('fa-gbp')
            $('#currency_symbol').addClass('fa-' + result['currency'])
        }
    });
});

