<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href='{{  asset("font-awesome-4.7.0/css/font-awesome.min.css")}}'>
    <title>Login - Vali Admin</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>Shop</h1>
    </div>
    <div class="login-box">
        <form style="margin-top: -10px;" class="login-form" action="{{ route('auth-reset-pwd') }}" method="post">

            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ĐỔI MẬT KHẨU</h3>
            <span style="font-size: 16px; position: relative; top: -7px;" class="succ"></span>
            <br>
            {{csrf_field()}}
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-group">
                <label class="control-label">MẬT KHẨU</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
                <span style="color: crimson; position: relative; top: 5px;" class="error passworder"></span>
            </div>
            <div class="form-group">
                <label class="control-label">NHẬP LẠI</label>
                <input class="form-control" type="password" placeholder="Password" name="password_confirmation">
                <span style="color: crimson; position: relative; top: 5px;" class="error crpassworder"></span>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block sb"><i class="fa fa-sign-in fa-lg fa-fw"></i>SUBMIT</button>
                <a href="{{route('login')}}" class="btn btn-primary btn-block lgin"><i class="fa fa-sign-in fa-lg fa-fw"></i>BACK TO LOGIN</a>
            </div>
        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{asset('js/admin/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/admin/popper.min.js')}}"></script>
<script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
<script src="{{asset('js/admin/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('js/admin/plugins/pace.min.js')}}"></script>
<script type="text/javascript">
    $('.sb').show();
    $('.lgin').hide();
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });

    $('.login-form').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success:function (data) {
                if (data.error == true) {
                    $('.error').hide();
                    if (data.message.password != undefined) {
                        $('.passworder').show().text(data.message.password[0]);
                    }
                    if (data.message.password_confirmation != undefined) {
                        $('.crpassworder').show().text(data.message.password_confirmation[0]);
                    }
                }
                else if(data.succss == true){
                    $('.error').hide();
                    $('.succ').show().text(data.success);
                    $('.succ').css("color", 'green');
                    $('.sb').hide();
                    $('.lgin').show();
                    $('.form-control').val('');
                }
            }
        });
    });
</script>
</body>
</html>
