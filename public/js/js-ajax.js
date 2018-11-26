// xóa sản phẩm
var pathUrl = location.href;
$(".deletePro").confirm({
    title:"Cảnh báo",
    text:"Xác nhận xóa !",
    confirm: function(e) {
        var getId = e[0].id;
        $.ajax({
            type: 'get',
            data: {'getId':getId},
            url: pathUrl + '/delete-product',
            success:function (data) {
                $('tr#'+getId).remove();
            }

        });
    },
    cancel: function(button) {
    },
    confirmButton: "Xác nhận",
    cancelButton: "Hủy"
});
$(".deleteBaner").confirm({
    title:"Cảnh báo",
    text:"Xác nhận xóa !",
    confirm: function(e) {
        var getId = e[0].id;
        $.ajax({
            type: 'get',
            data: {'getId':getId},
            url: pathUrl + '/delete',
            success:function (data) {
                $('tr#'+getId).remove();
            }

        });
    },
    cancel: function(button) {
    },
    confirmButton: "Xác nhận",
    cancelButton: "Hủy"
});





// xóa danh mục
$(".deleteCate").confirm({
    title:"Cảnh báo",
    text:"Xác nhận xóa !",
    confirm: function(e) {
        var getId = e[0].id;
        $.ajax({
            type: 'get',
            data: {'getId':getId},
            url: 'categories/delete-categorie',
            success:function (data) {
                if (data.error == true){
                      alert("Bạn cần xóa hết các danh mục con và sản phẩm trước khi xóa danh mục này");
                }
                else {
                    $('tr#'+getId).remove();
                }
            }
        });
    },
    cancel: function(button) {
    },
    confirmButton: "Xác nhận",
    cancelButton: "Hủy"
});


//xóa user
$(".deleteUser").confirm({
    title:"Cảnh báo",
    text:"Xác nhận xóa !",
    confirm: function(e) {
        var getId = e[0].id;
        $.ajax({
            type: 'get',
            data: {'getId':getId},
            url: 'delete-user',
            success:function (data) {
                $('tr#'+getId).remove();
            }

        });
    },
    cancel: function(button) {
    },
    confirmButton: "Xác nhận",
    cancelButton: "Hủy"
});
$(".deleteUser-member").confirm({
    title:"Cảnh báo",
    text:"Xác nhận xóa !",
    confirm: function(e) {
        var getId = e[0].id;
        $.ajax({
            type: 'get',
            data: {'getId':getId},
            url: 'delete-user-member',
            success:function (data) {
                $('tr#'+getId).remove();
            }

        });
    },
    cancel: function(button) {
    },
    confirmButton: "Xác nhận",
    cancelButton: "Hủy"
});

// validate---add
$('#frm-cate-insert').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    url = $(this).attr('action');
    var nameValue = $('.cate_name').val();
    var slugValue = $('.cate_slug').val();
    let getId = $('.inputId').attr('value');
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        url: url,
        type: 'POST',
        data: formData,
        async: true,
        processData: false,
        contentType: false,
        success:function (data) {
            if (data.error == true){
                $('.successs').hide();
                $('.error').hide();
                if(data.message.cate_name != undefined){
                    $('.errorname').show().text(data.message.cate_name[0]);
                }
                if (data.message.cate_slug != undefined){
                    $('.errorslug').show().text(data.message.cate_slug[0]);
                }
                if (data.message.cate_image != undefined){
                    $('.errorsimage').show().text(data.message.cate_image[0]);
                }
                if (data.message.parent_id != undefined){
                    $('.errorparent_id').show().text(data.message.parent_id[0]);
                }
            }
            else {
                $('.successs').show();
                if (getId == undefined || getId == ''){
                    $('.successErr').text('Dữ liệu đã được thêm');
                    $('.error').hide();
                    $('.fixct').val('');
                    $('.cateid').attr('selected', true);
                }
                else {
                    $('.successErr').text('Dữ liệu đã được cập nhật');
                    $('.error').hide();
                }

            }
            return;
        }
    });
});

$(document).ready(function (){
    $('.cate_name').keyup(function (e) {
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
        $('.cate_slug').val(slug);
    })
});


// validate-update
$(document).ready(function () {
    let getId = $('.inputId').attr('value');
  if (typeof urlUadd != 'undefined' || typeof urlUpdate != 'undefined'){
      if (getId == undefined || getId == ''){
          $('form').attr("action", urlUadd);
      }
      else {
          $('form').attr("action", urlUpdate);
      }
  }
});

//like
// $('likeview').click(function (e) {
//     e.preventDefault();
//
// });

//add baner
$(".putRadio").confirm({
    title:"Cảnh báo",
    text:"Xác nhận dùng !",
    confirm: function(e) {
        var getId = e[0].name;
        $.ajax({
            type: 'get',
            data: {'getId':getId},
            url: 'baner/save-active',
            success:function (data) {
                if (data.success == true){
                    e.removeClass('noActive');
                    e.removeClass('btn-danger');
                    e.addClass('btn-success');
                    e.html('Đang dùng');
                    $('.noActive').removeClass('btn-success');
                    $('.noActive').addClass('btn-danger');
                    $('.noActive').html('Sử dụng');
                    e.addClass('noActive');
                    $('.GGG').removeClass('noActive');
                }
            }

        });
    },
    cancel: function(button) {
    },
    confirmButton: "Xác nhận",
    cancelButton: "Hủy"
});

$('#banerPost').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var url = $(this).attr('action');
    let getId = $('.inputId').attr('value');
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        url: url,
        type: 'POST',
        data: formData,
        async: true,
        processData: false,
        contentType: false,
        success:function (data) {
            if (data.error == true) {
                $('.successs').hide();
                $('.error').hide();

                if (data.message.baner_title != undefined) {
                    $('.baner_title_er').show().text(data.message.baner_title[0]);
                }
                if (data.message.baner_image != undefined) {
                    $('.baner_image_er').show().text(data.message.baner_image[0]);
                }
            }
            else {
                $('.successs').show();
                if (getId == undefined || getId == '') {
                    $('.successErr').text('Dữ liệu đã được thêm');
                    $('.error').hide();
                    $('.fixct').val('');
                }
                else {
                    $('.successErr').text('Dữ liệu đã được cập nhật');
                    $('.error').hide();
                }
            }
        }
    });
});


// pass
$('.savePass').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var url = $(this).attr('action');
    let getId = $('.inputId').attr('value');
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        url: url,
        type: 'POST',
        data: formData,
        async: true,
        processData: false,
        contentType: false,
        success:function (data) {
            console.log(data);
            $('.error').hide();
            if (data.error == true) {

                if(data.messages != undefined){
                    $('.errpassword').show().text(data.messages);
                    if (data.message.password != undefined) {
                        $('.errpassword').show().text(data.message.password[0]);
                }
                }

                if (data.message.new_password != undefined) {
                    $('.errnew_password').show().text(data.message.new_password[0]);
                }
                if (data.message.password_confirmation != undefined) {
                    $('.errpassword_confirmation').show().text(data.message.password_confirmation[0]);
                }
            }
            else {
                $('.error').hide();
                $('.null').val('');
                $('.showsuccess').text('Chúc mừng bạn đã đổi mật khẩu thành công');
            }
        }
    });
});



$('#Codeform').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var url = $(this).attr('action');
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        url: url,
        type: 'POST',
        data: formData,
        async: true,
        processData: false,
        contentType: false,
        success:function (data) {
            if (data.error == true) {
                $('.successs').hide();
                $('.error').hide();

                if (data.message.code_key != undefined) {
                    $('.code_keyerr').show().text(data.message.code_key[0]);
                }
                if (data.message.code_price != undefined) {
                    $('.code_priceerr').show().text(data.message.code_price[0]);
                }
                if (data.message.code_total != undefined) {
                    $('.code_totalerr').show().text(data.message.code_total[0]);
                }
                if (data.message.time != undefined) {
                    $('.timeerr').show().text(data.message.time[0]);
                }
            }
            else {
                $('.successs').show();
                    $('.successErr').text('Code đã được thêm');
                    $('.error').hide();
                    $('.fixctss').val('');
                }
            }
    });
});
