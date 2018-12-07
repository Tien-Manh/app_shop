
var getShowpage = 9;
var page = 1;
var url = window.location.pathname;
var desc = '';
var urlsearch = window.location.search;
var brand = '';
var color = '';
var firstval = '';
var lastval = '';

$('.brand-radio').on('click', function () {
    brand = $(this).val();
    getProductPage(page, url, brand);
});
$('.color-radio').on('click', function () {
    color = $(this).val();
    getProductPage(page, url, color);
});

$(document).on('change', '.desc', function () {
    desc = $(this).val();
    getProductPage(page, url, desc);
});
$(document).on('change', '.showPage', function () {
     getShowpage = $(this).val();
     getProductPage(page, url, getShowpage);
});

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1]
    getProductPage(page, url, getShowpage);
});

function getProductPage(page, url) {
    if(urlsearch != ''){
        urlLink = url + urlsearch +'&page='+ page + '&value=' + getShowpage + '&desc=' + desc + '&brand=' +brand  + '&color=' + color + '&firstval=' + firstval + '&lastval=' + lastval;
    }
    else {
        urlLink = url + '?page='+ page + '&value=' + getShowpage + '&desc=' + desc + '&brand=' +brand +  '&color=' + color +'&firstval=' + firstval + '&lastval=' + lastval;
    }
    $.ajax({
        url: urlLink,
    }).success(function (data) {
        $('#single_product').html(data);
    })
}

$('#price-range').on('click', function () {
   firstval = Number($('#lower-value').html());
   lastval = Number($('#upper-value').html());
    getProductPage(page, url, firstval, lastval);
});





//

$('.kh').hide();
$('#keyUpsr').keyup(function (e) {
    e.preventDefault();
    var getData = $(this).val();
    var _token = $('input[name="_token"]').val();
   if (getData != '') {
       $('.kh').show();
       $.ajax({
           url: '/products/ajax',
           method: 'GET',
           data: {getData:getData, _token:_token},
           success:function (data) {
               console.log(data);

               $('.producr_List').html(data);
           }
       })
   }
   else {
       $('.kh').hide();
   }
});

$('.getquantity').on('change', function (e) {
    var value = Number($(this).val());
    var valueId = $(this).attr('id');
    var url = $(this).parent('#findButton').attr('data');
    var quantityLp = $(this).parents('#findButtons').next('.parentTotal').children('.total').attr('data');
    var quantity = $(this).parents('#findButtons').next('.parentTotal').children('.total');
    var price = $(this).parents('#findButtons').prev('.parentprice').children('.price');
    var subtotal = $('.subtotal');
    var subtotalspan = $('.subtotal span');
    var setsubVal = Number(subtotal.attr('data'));
       if(value <= 1){
            $(this).attr('value', 1);
            $(this).val(1);
           var setVal = Number(price.attr('data'))*1;
           quantity.text(String(setVal).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VNĐ');
           subtotal.attr('data', setsubVal + Number(price.attr('data')) * value - quantityLp);
           subtotalspan.text(String(setsubVal + Number(price.attr('data')) * value - quantityLp).replace(/(.)(?=(\d{3})+$)/g,'$1.'));
           $('#totalsNumbe').val(setsubVal + Number(price.attr('data'))* value - quantityLp);
        }
        else {
           subtotal.attr('data', setsubVal + Number(price.attr('data')) * value - quantityLp);
           subtotalspan.text(String(setsubVal + Number(price.attr('data')) * value - quantityLp).replace(/(.)(?=(\d{3})+$)/g,'$1.'));
           $('#totalsNumbe').val(setsubVal + Number(price.attr('data'))* value - quantityLp);
   }


    $.ajax({
        url: url,
        data: '&id='+valueId + '&value='+value,
        success:function (data) {
            if (data.success == true && value >= 1){
                var setVal = Number(price.attr('data'))*value;
                quantity.text(String(setVal).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VNĐ');
            }
        }
    })
});

$('#findButton button').on('click', function (e) {
    var getId = $(this).attr('id');
    var value = Number($(this).parent('#findButton').prev('.getquantity').val());
    var valueId = $(this).parent('#findButton').prev('.getquantity').attr('id');
    var url = $(this).parent('#findButton').attr('data');
    var quantity = $(this).parents('#findButtons').next('.parentTotal').children('.total');
    var price = $(this).parents('#findButtons').prev('.parentprice').children('.price');
    var subtotal = $('.subtotal');
    var subtotalspan = $('.subtotal span');
    var setsubVal = Number(subtotal.attr('data'));
    if (getId == 'nv'){
        value ++;
        subtotal.attr('data', setsubVal + Number(price.attr('data')));
        subtotalspan.text(String(setsubVal + Number(price.attr('data'))).replace(/(.)(?=(\d{3})+$)/g,'$1.'));
        $('#totalsNumbe').val(setsubVal + Number(price.attr('data')));
        $(this).parent().prev('.getquantity').attr('value', value);
    }
    else if(value <= 1){
        $(this).parent().prev('.getquantity').attr('value', 1);
    }
    else {
        value --;
        subtotal.attr('data', setsubVal - Number(price.attr('data')));
        subtotalspan.text(String(setsubVal - Number(price.attr('data'))).replace(/(.)(?=(\d{3})+$)/g,'$1.'));
        $('#totalsNumbe').val(setsubVal - Number(price.attr('data')));
        $(this).parent().prev('.getquantity').attr('value', value);
    }

    $.ajax({
        url: url,
        data: '&id='+valueId + '&value='+value,
        success:function (data) {
            if (data.success == true){
                var setVal = Number(price.attr('data'))*value;
                quantity.text(String(setVal).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VNĐ');
            }
        }
    })
});
$('#keyUpsr').val('');
$('.search-menu button').on('click', function (e) {
    var getVal = $('#keyUpsr').val();
    if (getVal == ''){
        e.preventDefault();
        alert('Bạn chưa nhập dữ liệu !');
    }

});
