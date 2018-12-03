$('#formProduct').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    for(var i = 0; i < files.length; i++){
        formData.append(files[i].name, files[i]);
    }
    url = $(this).attr('action');
    let getId = $('.inputIdpr').attr('value');
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: formData,
        url: url,
        type: 'POST',
        async: true,
        processData: false,
        contentType: false,
        success:function (response) {
            console.log(response);
            if (response.error == true){
                $('.successs').hide();
                $('.error').hide();
                if(response.message.product_name != undefined){
                    $('.product_name').show().text(response.message.product_name[0]);
                }
                if (response.message.product_slug != undefined){
                    $('.product_slug').show().text(response.message.product_slug[0]);
                }
                if (response.message.description != undefined){
                    $('.description').show().text(response.message.description[0]);
                }
                if (response.message.short_description != undefined){
                    $('.short_description').show().text(response.message.short_description[0]);
                }

                if (response.message.cate_id != undefined){
                    $('.cate_id').show().text(response.message.cate_id[0]);
                }
                if (response.message.price != undefined){
                    $('.price').show().text(response.message.price[0]);
                }
                if (response.message.sell_price != undefined){
                    $('.sell_price').show().text(response.message.sell_price[0]);
                }
                if (response.message.product_image != undefined){
                    $('.product_image').show().text(response.message.product_image[0]);
                }
                if (response.message.amount != undefined){
                    $('.amount').show().text(response.message.amount[0]);
                }
                if (response.message.brand != undefined){
                    $('.err_brand').show().text(response.message.brand[0]);
                }
                if (response.message.madein != undefined){
                    $('.err_madein').show().text(response.message.madein[0]);
                }
                if (response.message.type != undefined){
                    $('.err_type').show().text(response.message.type[0]);
                }
                if (response.message.weight != undefined){
                    $('.err_weight').show().text(response.message.weight[0]);
                }
                if (response.message.new != undefined){
                    $('.err_new').show().text(response.message.new[0]);
                }
                if (response.message.color != undefined){
                    $('.err_color').show().text(response.message.color[0]);
                }
            }
            else {
                $('.successs').show();
                if (getId == undefined || getId == ''){
                    $('.successErr').text('Dữ liệu đã được thêm');
                    $('.error').hide();
                    $('.fixctp').val('');
                    $('.fixctrt').val('0');
                    var rem = $('#result')[0];
                    rem.parentNode.removeChild(rem);

                }
                else {
                    $('.successErr').text('Dữ liệu đã được cập nhật');
                    $('.error').hide();
                }

            return;
        }
        }
    });
});

$(document).ready(function () {
    let getId = $('.inputIdpr').attr('value');
    if (typeof urlUadd != 'undefined' || typeof urlUpdate != 'undefined') {
        if (getId == undefined || getId == ''){
            $('#formProduct').attr("action", urlUadd);
        }
        else {
            $('form').attr("action", urlUpdate);
        }
    }
});


$('#formuser').on('submit', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        url: url,
        data: formData,
        type: 'POST',
        async: true,
        processData: false,
        contentType: false,
        success:function (response) {
            $('#successlogin').hide();
            $('.error').hide();
            if (response.error == true){
                if(response.message.add_name != undefined){
                    $('.add_name_err').show().text(response.message.add_name[0]);
                }
                if(response.message.add_name_login != undefined){
                    $('.add_name_login_err').show().text(response.message.add_name_login[0]);
                }
                if(response.message.add_email != undefined){
                    $('.add_email_err').show().text(response.message.add_email[0]);
                }
                if(response.message.add_password != undefined){
                    $('.add_password_err').show().text(response.message.add_password[0]);
                }
                if(response.message.add_password_confir != undefined){
                    $('.add_password_confir_err').show().text(response.message.add_password_confir[0]);
                }

            }
            else{
                $('.successs').show().text('Tài khoản đã được thêm');
                $('.fixctp').val('');
            }
        }
    })
})

$(document).ready(function (){
    $('.product_name').keyup(function (e) {
        var title, slug;
        title = $(this).val();
        slug = title.toLowerCase();

        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd')
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        $('.product_slug').val(slug);
    })
});

// function number_format( number, decimals, dec_point, thousands_sep ) {
//     var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
//     var d = dec_point == undefined ? "," : dec_point;
//     var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
//     var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
//
//     return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
// }
