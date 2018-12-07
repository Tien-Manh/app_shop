

<header class="default-header">
    <div class="menutop-wrap">
        <div class="menu-top container">
            <div class="d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="{{route('view.show')}}">
                    <div><h3>Top fashion</h3></div>
                    {{--<img src="{{asset('fontend/img/logo.png')}}" alt="">--}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <ul class="list">
                    <li><a href="tel:+12312-3-1209">+12312-3-1209</a></li>
                    <li><a href="mailto:support@colorlib.com">support@colorlib.com</a></li>
                </ul> -->
                <ul class="list">
                    @if(Auth::user() && Auth::user()->active == 0)
                       <li style="position: relative; z-index: 1200" class="show"><a style="color: #0b0b0b; cursor: pointer" class="@if (Request::url() == route('show.infomem'))gv
                    @endif lk">{{Auth::user()->name}}</a>
                           <ul class="ul-sub">
                               <li class="lhs"><a class="lhs" href="{{route('show.infomem')}}"><i class="far fa-user lhs" style="position: relative; top: 0px; padding-right: 10px; left: -3px;"></i> Thông tin</a></li>
                               <li class="lhs"><a class="lhs" href="{{route('logout.user')}}"><i class="fal fa-sign-out lhs" style="position: relative; top: 0px; padding-right: 10px; left: -3px;"></i> Đăng xuất</a></li>
                           </ul>
                       </li>
                    @else
                        <li><a href="{{route('login.user')}}">Đăng nhập</a></li>
                    @endif
                    <li class="@if (Request::url() == route('show.card') || Request::url() == route('check.onecart'))gv
                    @endif"><a href="{{route('show.card')}}"><i class="fa fa-shopping-cart" style="font-size:18px; padding: 0 5px;" aria-hidden="true"></i> <span class="setTotal">
                                <?php use App\Http\Controllers\Client\HomeController; echo HomeController::totalCart()?>
                            </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('layout.layout-fontend.nav-view')
</header>
