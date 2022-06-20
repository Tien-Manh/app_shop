@extends('layout.layout-fontend.index')
@section('title', 'Trang chủ')
@section('baner')
    @include('layout.layout-fontend.barner-view')
@endsection
@section('bran_area')
    @include('layout.layout-fontend.bran-area')
@endsection
@section('contents')
<!-- Start category Area -->


<section class="category-area section-gap section-gap" id="catagory">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40">
                <div class="title text-center">
                    <h1 class="mb-10">Mua sắm cho các hạng mục khác nhau</h1>
                    <p>Ai là người cực kỳ yêu thích với hệ sinh thái thân thiện.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-12">
                <div class="row category-bottom">
                    @foreach($categories as $value)
                    <div class="col-lg-4 col-md-4 mb-30">
                        <div class="content" style="height: 200px; overflow: hidden">
                            <a href="{{route('show.cates', ['id' => $value->cate_slug])}}">
                                <div class="content-overlay"></div>
                                @if($value->cate_image != '')
                                    <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/image/cate_image/'. $value->cate_image)}}" alt="">
                                @else
                                    <img class="content-image img-fluid d-block mx-auto" src="{{asset('fontend/img/c2.jpg')}}">
                                @endif
                                    <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title">{{$value->cate_name}}</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            {{--<div class="col-lg-4 col-md-4 mb-10">--}}
                {{--<div class="content">--}}
                    {{--<a href="#" target="_blank">--}}
                        {{--<div class="content-overlay"></div>--}}
                        {{--<img class="content-image img-fluid d-block mx-auto" src="img/c4.jpg" alt="">--}}
                        {{--<div class="content-details fadeIn-bottom">--}}
                            {{--<h3 class="content-title">Sản phẩm cho Nam</h3>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</section>
<!-- End category Area -->

<!-- Start men-product Area -->
<section class="men-product-area section-gap relative" id="men">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40">
                <div class="title text-center">
                    <h1 class="text-white mb-10">Sản phẩm mới cho Nam</h1>
                    <p class="text-white">Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($products_nam as $value)

            <div class="col-lg-3 col-md-6 single-product">
                <div class="content">
                    <a href="{{route('view.show.detail', ['id' => $value->product_slug])}}">
                        <div class="content-overlay"></div>
                        <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/image/image_crop/' . $value->product_image)}}" alt="">
                    </a>
                    <div class="content-details fadeIn-bottom">
                        <div class="bottom d-flex align-items-center justify-content-center">
                            {{--{{\App\Likeview::where('prodct_id', $value->id)->where('user_id', Auth::user()->id)->first()['user_id']}}--}}
                            @if (!empty(Auth::user()))
                                @if(!empty(\App\Likeview::where('prodct_id', $value->id)->where('user_id', Auth::user()->id)->first()['user_id']))
                                    <a class="likeview"><span style="cursor:pointer; color: crimson; text-shadow:0 0 3px white, 0 0 5px white;" class="fa fa-heart"> &nbsp </span><span class="text-white viewCount">@if(count(\App\Likeview::where('prodct_id', $value->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $value->id)->get())}} @endif</span></a>
                                @else
                                    <a href="{{route('add.like', ['id' => $value->id])}}" class="likeview"><span class="far fa-heart"> &nbsp @if(count(\App\Likeview::where('prodct_id', $value->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $value->id)->get())}} @endif</span></a>
                                @endif
                            @else
                                <a style="cursor: pointer;" class=""><span class="far fa-heart"> &nbsp @if(count(\App\Likeview::where('prodct_id', $value->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $value->id)->get())}} @endif</span></a>
                            @endif
                            <a href="{{route('view.show.detail', ['id' => $value->product_slug])}}"><span class="lnr lnr-layers"></span></a>
                            <a href="javascript:" class="hie" style="position: absolute; cursor: wait; left: 66%;background-color: transparent; width: 27.5%; display: none"><span style="opacity: 0;" class="lnr lnr-cart"></span></a>
                            <a href="javascript:" class="cartCk" id="{{$value->id}}"><span class="lnr lnr-cart"></span></a>
                        </div>
                    </div>


                </div>
                <div class="price">
                    <h5 class="text-white">{{$value->product_name}}</h5>
                    @if($value->sell_price == '' || empty($value->sell_price) || $value->sell_price == null || $value->sell_price == 0)
                        <h3 class="text-white">{{number_format($value->price)}} VNĐ</h3>
                    @else
                        <del><h3 class="text-white" style="font-size: 18px; margin-bottom: 5px;">{{number_format($value->price)}} VNĐ</h3></del>
                        <h3 class="text-white">{{number_format($value->sell_price)}} VNĐ</h3>
                    @endif
                </div>
            </div>

             @endforeach

        </div>
    </div>
</section>
<!-- End men-product Area -->

<!-- Start women-product Area -->

<section class="women-product-area section-gap" id="women">
    <div class="container">
        <div class="countdown-content pb-40">
            <div class="title text-center">
                <h1 class="mb-10">Sản phẩm mới cho Nữ</h1>
                <p>Who are in extremely love with eco friendly system.</p>
            </div>
        </div>
        <div class="row">
            @foreach($products_nu as $value)
                <div class="col-lg-3 col-md-6 single-product">
                    <div class="content">
                        <a href="{{route('view.show.detail', ['id' => $value->product_slug])}}">
                        <div class="content-overlay"></div>
                        <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/image/product_image/' . $value->product_image)}}" alt="">
                        </a>
                        <div class="content-details fadeIn-bottom">
                            <div class="bottom d-flex align-items-center justify-content-center">
                                {{--{{\App\Likeview::where('prodct_id', $value->id)->where('user_id', Auth::user()->id)->first()['user_id']}}--}}
                                @if (!empty(Auth::user()))
                                    @if(!empty(\App\Likeview::where('prodct_id', $value->id)->where('user_id', Auth::user()->id)->first()['user_id']))
                                        <a class="likeview"><span style="cursor:pointer; color: crimson; text-shadow:0 0 3px white, 0 0 5px white;" class="fa fa-heart"> &nbsp </span><span class="text-white viewCount">@if(count(\App\Likeview::where('prodct_id', $value->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $value->id)->get())}} @endif</span></a>
                                    @else
                                        <a href="{{route('add.like', ['id' => $value->id])}}" class="likeview"><span class="far fa-heart"> &nbsp @if(count(\App\Likeview::where('prodct_id', $value->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $value->id)->get())}} @endif</span></a>
                                    @endif
                                @else
                                    <a style="cursor: pointer;" class=""><span class="far fa-heart"> &nbsp @if(count(\App\Likeview::where('prodct_id', $value->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $value->id)->get())}} @endif</span></a>
                                @endif
                                <a href="{{route('view.show.detail', ['id' => $value->product_slug])}}"><span class="lnr lnr-layers"></span></a>
                                <a href="javascript:" class="hie" style="position: absolute; cursor: wait; left: 66%;background-color: transparent; width: 27.5%; display: none"><span style="opacity: 0;" class="lnr lnr-cart"></span></a>
                                <a href="javascript:" class="cartCk" id="{{$value->id}}"><span class="lnr lnr-cart"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <h5>{{$value->product_name}}</h5>
                        @if($value->sell_price == '' || empty($value->sell_price) || $value->sell_price == null || $value->sell_price == 0)
                            <h3>{{number_format($value->price)}} VNĐ</h3>
                        @else
                            <del><h3 style="font-size: 18px; margin-bottom: 5px;">{{number_format($value->price)}} VNĐ</h3></del>
                            <h3>{{number_format($value->sell_price)}} VNĐ</h3>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End women-product Area -->

<!-- Start Count Down Area -->
<div class="countdown-area">
    <div class="container">
        <div class="countdown-content">
            <div class="title text-center">
                <h1 class="mb-10">Thời gian kết thúc ưu đãi còn</h1>
                <p>Nhanh tay mua sắm trước khi thời gian kết thúc.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4"></div>
            <div class="col-xl-6 col-lg-7">
                <div class="countdown d-flex justify-content-center justify-content-md-end" id="js-countdown">
                    <div class="countdown-item">
                        <div class="countdown-timer js-countdown-days time" aria-labelledby="day-countdown">

                        </div>

                        <div class="countdown-label" id="day-countdown">Days</div>
                    </div>

                    <div class="countdown-item">
                        <div class="countdown-timer js-countdown-hours" aria-labelledby="hour-countdown">

                        </div>

                        <div class="countdown-label" id="hour-countdown">Hours</div>
                    </div>

                    <div class="countdown-item">
                        <div class="countdown-timer js-countdown-minutes" aria-labelledby="minute-countdown">

                        </div>

                        <div class="countdown-label" id="minute-countdown">Minutes</div>
                    </div>

                    <div class="countdown-item">
                        <div class="countdown-timer js-countdown-seconds" aria-labelledby="second-countdown">

                        </div>

                        <div class="countdown-label text" id="second-countdown">Seconds</div>
                    </div>
                    <a href="#" class="view-btn primary-btn2"><span>Shop Now</span></a>
                    <img src="{{asset('fontend/img/cd.png')}}" class="img-fluid cd-img" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Count Down Area -->

@endsection
@section('myjs')
    <script src="{{asset('js/addcar.js')}}"></script>
    <script src="{{asset('js/products-ajax.js')}}"></script>
@endsection
