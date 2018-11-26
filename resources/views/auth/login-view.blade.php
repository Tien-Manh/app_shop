@extends('layout.layout-fontend.index')
@section('title', 'Đăng nhập')
@section('baner')
    @include('layout.layout-fontend.baner-sub', ['name_show' => 'Đăng nhập', 'name_page' => 'Trang Đăng Nhập'])
@endsection
@section('contents')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <span style="color: crimson; font-size: 16px; position: relative; left: 30px; top: -7px;" class="error emailer text-center"></span>

            <div class="reset-form hide-reset-form">
                <h3 class="billing-title text-center">Lấy lại mật khẩu</h3>
                <form class="forget-form" action="{{route('reset.password')}}" method="post">
                    {{csrf_field()}}
                    <input type="text" name="email" required class="common-input mt-20 hj"><label class="rf kjs"></label>
                    <button class="view-btn color-2 mt-20 w-100"><span>Xác nhận</span></button>
                    <a  class="view-btn color-2 mt-20 w-100 reback"><span>Quay lại</span></a>
                </form>
            </div>
            <div class="login-form">
                <h3 class="billing-title text-center">Đăng nhập</h3>
                <p class="text-center mt-80 mb-40">Chào mừng trở lại! đăng nhập vào tài khoản của bạn </p>
                @if(session('errMsg') != "")
                    <span style="color:red;top: -15px;position: relative;font-size: 15px;">{{session('errMsg')}}</span>
                @endif
                <form action="{{route('login.user')}}" method="post">
                    {{csrf_field()}}
                    <input type="text" name="name_login" placeholder="Tên đăng nhập hoặc Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Tên đăng nhập hoặc Email*'" required class="common-input mt-20">
                    <input type="password" name="password" placeholder="Mật khẩu*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Mật khẩu*'" required class="common-input mt-20">
                    <button class="view-btn color-2 mt-20 w-100"><span>Đăng nhập</span></button>
                    <div class="mt-20 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center"><input type="checkbox" class="pixel-checkbox" id="login-1"><label for="login-1">Giữ đăng nhập</label></div>
                        <a class="showForm" href="javascript:">Bạn quên mật khẩu?</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="register-form">
                <h3 class="billing-title text-center">Đăng ký</h3>
                <p class="text-center mt-40 mb-30">Tạo tài khoản của riêng bạn </p>
                <form action="{{route('resign')}}" method="post" id="form-res">
                    {{csrf_field()}}
                    <span id="successlogin" class=""></span>
                    <input name="name" type="text" placeholder="Họ và tên*" onblur="this.placeholder = 'Họ và tên*'"  class="common-input mt-20">
                    <span class="fixcc error_name"></span>
                    <input name="name_login" type="text" placeholder="Tên đăng nhập*" name="name_login"  onblur="this.placeholder = 'Tên đăng nhập*'"  class="common-input mt-20 name_login">
                    <span class="fixcc error_name_login"></span>
                    <input name="email" type="email" placeholder="Email*" onblur="this.placeholder = 'Email*'"  class="common-input mt-20">
                    <span class="fixcc error_email"></span>
                    <input name="password" type="password" placeholder="Mật khẩu*"  onblur="this.placeholder = 'Mật khẩu*'"  class="common-input mt-20">
                    <span class="fixcc error_password"></span>
                    <input name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu*" name="password_confirmation" onblur="this.placeholder = 'Nhập lại mật khẩu*'"  class="common-input mt-20 password_confirmation">
                    <span class="fixcc error_password_confirmation"></span>
                    <button class="view-btn color-2 mt-20 w-100"><span>Đăng ký</span></button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('myjs')
    <script src="{{asset('fontend/js/g.js')}}"></script>
    <script src="{{asset('js/products-ajax.js')}}"></script>
    <script type="text/javascript">
        $('#form-res').on('submit', function (e) {
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
                    $('.fixcc').hide();
                    if (response.error == true){
                        if(response.message.name != undefined){
                            $('.error_name').show().text(response.message.name[0]);
                        }name
                        if(response.message.name_login != undefined){
                            $('.error_name_login').show().text(response.message.name_login[0]);
                        }
                        if(response.message.email != undefined){
                            $('.error_email').show().text(response.message.email[0]);
                        }
                        if(response.message.password != undefined){
                            $('.error_password').show().text(response.message.password[0]);
                        }
                        if(response.message.password_confirmation != undefined){
                            $('.error_password_confirmation').show().text(response.message.password_confirmation[0]);
                        }

                    }
                    else{
                        $('#successlogin').show().html('Đăng ký tài khoản thành công');
                        $('input').val('');
                    }
                }
            })
        })

    </script>
@endsection


