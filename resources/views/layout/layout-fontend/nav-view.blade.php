
<nav class="navbar navbar-expand navbar-light">
    <div class="container">
        <div class="collapse navbar-collapse  align-items-center" id="navbarSupportedContent">
            <div class="col-md-12">
                <ul class="navbar-nav ">
                    <!-- Dropdown -->
                    @foreach($nav as $val)
                    <li class="dropdown">
                        <a class="dropdown-none" href="{{route('show.cates', ['id' => $val->cate_slug])}}" id="navbardrop">{{$val->cate_name}}</a>
                        <div class="dropdown-menu ttt">
                            <ul class="submenu">
                                <?php echo showNav($subnav, $val->id, '') ?>
                             </ul>
                        </div>
                    </li>
                    @endforeach
                    <li class="dropdown">
                        <a class="dropdown-none" href="{{route('show.products')}}" id="navbardrop">Sản phẩm</a>
                    </li>
                 @include('layout.layout-fontend.search')
                </ul>
            </div>
        </div>
    </div>
</nav>
