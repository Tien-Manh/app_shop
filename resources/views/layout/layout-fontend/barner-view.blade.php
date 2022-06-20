<section class="banner-area relative" id="sale">
    <div class="container-fluid">

        @if (!empty($baner))
            <div class="row fullscreen align-items-center justify-content-center">
                <div class="col-lg-6 col-md-12 d-flex align-self-end img-right no-padding">
                    <img class="img-fluid" src="{{asset('assets/image/baner_image/' . $baner->baner_image)}}" alt="">
                </div>
                <div class="banner-content col-lg-6 col-md-12">
                    <h1 class="title-top"><span>{{$baner->baner_title}}</span> {{$baner->baner_content}}</h1>
                    <h1 class="text-uppercase">
                       {{$baner->baner_content_one}} <br>
                        {{$baner->baner_content_two}}
                    </h1>
                    <button class="primary-btn text-uppercase"><a href="#">Mua bây giờ</a></button>
                </div>
            </div>
        @else
        <div class="row fullscreen align-items-center justify-content-center">
            <div class="col-lg-6 col-md-12 d-flex align-self-end img-right no-padding">
                <img class="img-fluid" src="{{asset('fontend/img/header-img.png')}}" alt="">
            </div>
            <div class="banner-content col-lg-6 col-md-12">
                <h1 class="title-top"><span>Giảm giá</span> 75%</h1>
                <h1 class="text-uppercase">
                    Chỉ có trong <br>
                    MÙA NÀY!
                </h1>
                <button class="primary-btn text-uppercase"><a href="#">Mua bây giờ</a></button>
            </div>
        </div>
        @endif
    </div>
</section>
