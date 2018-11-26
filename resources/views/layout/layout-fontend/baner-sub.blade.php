<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
            <div class="col-first">
                <h1>@if(!empty($name_page)){{$name_page}}@endif</h1>
                <nav class="d-flex align-items-center justify-content-start">
                    <a href="{{route('view.show')}}">Trang chủ<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <a href="javascript:">@if(!empty($name_page)){{$name_show}}@endif</a>
                </nav>
            </div>
        </div>
    </div>
</section>
