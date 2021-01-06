// Filter
$('body').on('change', '.w_sidebar input', function () {
    var $checked = $('.w_sidebar input:checked'),
        $data = '';

    $checked.each(function () {
       $data += this.value + ',';
    });

    if($data){

        $.ajax({
           url: location.href,
           data: {
               filter: $data,
           },
           type: 'GET',
           beforeSend: function () {
                $('.preloader').fadeIn(300, function () {
                    $('.product-one').hide();
                });
           },
           success: function (res) {
                $('.preloader').delay(300).fadeOut('slow', function () {
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, ''),
                        newUrl = location.pathname + url + (location.search ? "&" : "?") + "filter=" + $data;

                    newUrl = newUrl.replace('&&', '&');
                    newUrl = newUrl.replace('?&', '?');
                    history.pushState({}, '', newUrl);
                });
           },
           error: function () {
               $('.product-one').html('<div class="alert alert-danger">Ошибка. Попробуйте ещё раз.</div>');
           }
        });

    } else{
        window.location = location.pathname;
    }
});

// Search ***************************************************
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});


// Currency select ******************************************
$('#currency').change(function () {
    window.location = 'currency/change?currency=' + $(this).val();
});


// Cart ***************************************************
$('body').on('click', '.add-to-cart-link', function (event) {
    event.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
        if( isNaN(qty) || qty > 3 ){
            alert('Указанное количество товара недоступно');
        } else{
            mod = $('.available select').val();

            $.ajax({
                url: '/cart/add',
                data: {
                    id: id, qty: qty, mod: mod,
                },
                type: 'GET',
                success: function (res) {
                    showCart(res);
                },
                error: function () {
                    alert('Ошибка. Пожалуйста, попробуйте позже. Благодарим Вас за понимание.');
                }
            });
        }
});

// Clear cart **********************************************
function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка. Пожалуйста, попробуйте позже. Благодарим Вас за понимание.');
        }
    });
}

// Delete element cart ***************************************************
$('#cart .modal-body').on('click', '.del-item', function () {
   var id = $(this).data('id');

   $.ajax({
      url: '/cart/delete',
      data: {id: id},
      type: 'GET',
      success: function (res) {
          showCart(res);
      },
       error: function () {
           alert('Ошибка. Пожалуйста, попробуйте позже. Благодарим Вас за понимание.');
       }
   });
});

// Show Cart ***************************************************
function showCart(res){
    if( $.trim(res) == '<h4>Ваша корзина пуста.</h4>' ){
        $('#cart .modal-footer .btn-primary, #cart .modal-footer .btn-danger').css('display','none');
    } else{
        $('#cart .modal-footer .btn-primary, #cart .modal-footer .btn-danger').css('display','inline-block');
    }

    $('#cart .modal-body').html(res);
    $('#cart').modal();

    if( $('.cart-sum').text() ){
        $('.simpleCart_total').text( $('.cart-sum').text() );
    } else{
        $('.simpleCart_total').text(0);
    }
}

// Get Cart ***************************************************
function getCart(){
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка. Пожалуйста, попробуйте позже. Благодарим Вас за понимание.');
        }
    });
}

// Modifications product ***************************************************
$('.available select').on( 'change', function () {

    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        oldPrice = $(this).find('option').filter(':selected').data('old-price'),

        baseOldPrice = $('#base-old-price').data('old-base'),
        basePrice = $('#base-price').data('base');

    if( price ){
        $('#base-price').text(symbolLeft + price + symbolRight);
    }
    if( oldPrice ){
        $('#base-old-price').text(symbolLeft + oldPrice + symbolRight)
    }
    else{
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
        $('#base-old-price').text(symbolLeft + baseOldPrice + symbolRight);
    }
});
