
<nav class="navbar navbar-expand navbar-light">
    <div class="container">
        <div class="collapse navbar-collapse  align-items-center" id="navbarSupportedContent">
            <div class="col-md-12">
                <ul class="navbar-nav ">
                    <!-- Dropdown -->
                    <li class="dropdown">
                        <a class="@if(Request::url() == route('view.show')) actives @endif dropdown-none" href="{{route('view.show')}}" id="navbardrop">Trang chủ</a>
                    </li>
                    @foreach($nav as $val)
                    <li class="dropdown">
                        <a class="@if(Request::url() == route('show.cates', ['id' => $val->cate_slug])) actives @endif dropdown-none" href="{{route('show.cates', ['id' => $val->cate_slug])}}" id="navbardrop">{{$val->cate_name}}</a>
                        <div class="dropdown-menu ttt">
                            <ul class="submenu">
                                <?php echo showNav($subnav, $val->id, '') ?>
                             </ul>
                        </div>
                    </li>
                    @endforeach
                    <li class="dropdown">
                        <a class="@if(Request::url() == route('show.sale')) actives @endif dropdown-none" href="{{route('show.sale')}}" id="navbardrop">Giảm Giá</a>
                    </li>
                    <li class="dropdown">
                        <a class="@if(Request::url() == route('show.products') || request()->is('sreach') || request()->is('product/*')) actives @endif dropdown-none" href="{{route('show.products')}}" id="navbardrop">Sản phẩm</a>
                    </li>
                 @include('layout.layout-fontend.search')
                </ul>
            </div>
        </div>
    </div>
</nav>

