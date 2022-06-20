// acive and of
var baseUrl = window.location.pathname;

// $('.toggle').click(function (e) {
//     if (confirm('Xác nhận thay đổi mục này ?')) {
//
//     }
// });

$('.order_active').click(function (e) {
    if (confirm('Xác nhận đơn hàng ?')) {
        var id = $(this).attr('id');
        $.ajax({
            type: 'get',
            data: {'getId': id},
            url: baseUrl + '/save-active',
            success: function (data) {
                if (data.success == true) {
                    $('.order_active').css({'cursor': 'not-allowed',  'pointer-events' : 'none'});
                    $('.order_active').html('Đã xác nhận');
                    $('.fa-pencil').hide();
                }
                else {
                    $('.order_active').html('Lỗi xác nhận !');
                    $('.order_active').css({'color': 'red'});
            }
            }
        });
    }
});
$(".toggle").click(function(e){
    if(confirm('Xác nhận thay đổi !')) {
        var id = $(this).attr('id');
        var getId = id.replace('toggle', '');
        var value = '';
        if ($(this).attr('checked')) {
            $(this).val(0);
            value = 0
        }
        else {
            $(this).val(1);
            value = 1;
        }
        $.ajax({
            type: 'get',
            data: {'getId': getId, value},
            url: baseUrl + '/save-active',
            success: function () {
            }
        });
    }
    else {
        return false;
    }
});

//
jQuery(document).ready(function() {
    Demo.init(); // init demo features
    TableEditable.init();
});



// add shopfood

