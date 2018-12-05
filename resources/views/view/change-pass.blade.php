@extends('layout.layout-fontend.index')
@section('title', 'Thông tin')
@section('contents')
    <div class="container col-6">
        <form method="post" action="{{route('save.pass')}}" class="billing-form savePass">
            {{csrf_field()}}
            <div class="my-repass-section row">
                <div class="my-repass-header col-lg-12">
                    <h3 class="billing-title mt-20 mb-10">Đổi mật khẩu</h3>
                </div>
                <div class="my-repass-content col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-center mt-20 mb-50">Điền thông tin để đổi mật khẩu</p>
                            <p style="font-size: 16px;" class="showsuccess text-success text-center"></p>
                            <input name="password" type="password" placeholder="Nhập mật khẩu cũ*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nhập mật khẩu cũ*'" required class="common-input null">
                            <span style="color: crimson; position: relative; top: 5px;" class="error errpassword"></span>
                            <input name="new_password" type="password" placeholder="Nhập mật khẩu mới*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nhập mật khẩu mới*'" required class="common-input null">
                            <span style="color: crimson; position: relative; top: 5px;" class="error errnew_password"></span>
                            <input name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nhập lại mật khẩu*'" required class="common-input null">
                            <span style="color: crimson; position: relative; top: 5px;" class="error errpassword_confirmation"></span>
                            <button class="view-btn col-lg-12 color-2 mt-20"><span>Đổi mật khẩu</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('myjs')
    <script src="{{asset('js/products-ajax.js')}}"></script>
    <script>
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
    </script>
@endsection
