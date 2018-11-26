<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png')}}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Shop | @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link href="{{asset('fontawesome-pro-5.0.13/css/all.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('fontend/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/ion.rangeSlider.skinFlat.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/owl.carousel.css')}}">
</head>
<body>

<!-- Start Header Area -->
@include('layout.layout-fontend.header-view')
<!-- End Header Area -->

<!-- start banner Area -->
@yield('baner')
<!-- End banner Area -->
@yield('bran_area')
@yield('contents')
<!-- start footer Area -->
@include('layout.layout-fontend.footer-view')
<!-- End footer Area -->
<script src="{{asset('fontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('fontend/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('fontend/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('fontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('fontend/js/jquery.sticky.js')}}"></script>
<script src="{{asset('fontend/js/ion.rangeSlider.js')}}"></script>
<script src="{{asset('fontend/js/nouislider.min.js')}}"></script>
<script src="{{asset('fontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('fontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('fontend/js/main.js')}}"></script>

<script>
   $(document).ready(function () {
       $('.ul-sub .lhs').hover(function () {
           $('.lk').css('color', 'white');
       });
       $('.ul-sub .lhs').on('mouseout', function () {
           $('.lk').css('color', 'black');
       });
   });

</script>

@yield('myjs')

</body>
</html>
