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
    <title>Login - Shop</title>
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
        <form class="login-form" action="{{ route('login') }}" method="post">
         
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ĐĂNG NHẬP</h3>

            {{csrf_field()}}

            @if(session('errMsg') != "")
            <span style="color:red;top: -15px; position: relative;font-size: 15px;">{{session('errMsg')}}</span>
            @endif
            {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}


          <div class="form-group" style="margin-top: -8px;">
            <label class="control-label">TÊN ĐĂNG NHẬP</label>
            <input class="form-control" type="text" placeholder="Email" name="name" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">MẬT KHẨU</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox" value="1" name="remember"><span class="label-text">Nhớ Đăng Nhập</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Quên Mật Khẩu ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Đăng Nhập</button>
          </div>
        </form>
        <form class="forget-form" action="{{route('reset.password')}}" method="post">
            {{csrf_field()}}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Lấy lại mật khẩu ?</h3>
          <div class="form-group">
              <span style="color: crimson; font-size: 16px; position: relative; top: -7px;" class="error emailer"></span>
              <br>
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" name="email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>GỬI</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Quay về đăng nhập</a></p>
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
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
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

    </script>
  </body>
</html>
