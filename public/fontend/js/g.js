$(document).ready(function () {
    var ship = 50000;
    var dp = 30000;
    $('#flat-rate').click(function (e) {
        var getTotal = $('#totalsNumbe').val();
        var setTotal = (parseFloat(getTotal) + ship);
        var newValue = String(setTotal).replace(/(.)(?=(\d{3})+$)/g,'$1.');
        $('.subtotal span').text(newValue);
    });
    $('#free-shipping').click(function (e) {
        var getTotal = $('#totalsNumbe').val();
        var setTotal = parseFloat(getTotal);
        var newValue = String(setTotal).replace(/(.)(?=(\d{3})+$)/g,'$1.');
        $('.subtotal span').text(newValue);
    });

    $('#local-delivery').click(function (e) {
        var getTotal = $('#totalsNumbe').val();
        var setTotal = (parseFloat(getTotal) + dp);
        var newValue = String(setTotal).replace(/(.)(?=(\d{3})+$)/g,'$1.');
        $('.subtotal span').text(newValue);
    });
})

$('.xem').click(function (e) {
    var Show = $(this).parents('.fixcm').children('.reply-comment');
    Show.show(500);
    $(this).hide(200);
});
$('.w-100').click(function () {
   $('.checkhide').show(500);
});
$('.hj').focus(function () {
    $('.rf').addClass('kj');
    $('.rf').removeClass('kjs');
});
$('.hj').blur(function () {
   if($(this).val() == ""){
       $('.rf').removeClass('kj');
       $('.rf').addClass('kjs');
   }
});

$('.showForm').click(function () {
    $('.login-form').addClass('hide-forms');
    $('.reset-form').addClass('show-reset-form');
});
$('.reback').click(function () {
    $('.login-form').removeClass('hide-forms');
    $('.reset-form').removeClass('show-reset-form');
    $('.login-form').addClass('show-forms');
});


$('.forget-form').on('submit', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success:function (data) {
            console.log(data);
            if (data.error == true) {
                if (data.message.email != undefined) {
                    $('.emailer').show().text(data.message.email[0]);
                }
            }
            else if(data.succss == true){
                $('.emailer').show().text(data.success);
                $('.emailer').css("color", 'green');
            }
        }
    });
});
