
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
   firstval = Number($('#lower-value').html()) *100;
   lastval = Number($('#upper-value').html()) *100;
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
