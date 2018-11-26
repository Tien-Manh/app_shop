@extends('layout.layout-fontend.index')
@section('title', $title)
@section('baner')
    @include('layout.layout-fontend.baner-sub', ['name_page' => 'Trang Sản Phẩm', 'name_show' => 'Sản phẩm'])
@endsection
@section('contents')


    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    {{--<a href="#" class="grid-btn active"><i class="fa fa-th" aria-hidden="true"></i></a>--}}
                    {{--<a href="#" class="list-btn"><i class="fa fa-th-list" aria-hidden="true"></i></a>--}}
                    <div class="sorting">
                        <select class="desc">
                            <option value="">Xắp xếp sản phẩm </option>
                            <option value="1">Giá từ thấp đến cao</option>
                            <option value="2">Giá từ cao đến thấp</option>
                            <option value="3">Sản phẩm mới nhất</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select class="showPage">
                            <option value="9">Hiển thị 9</option>
                            <option value="12">Hiển thị 12</option>
                            <option value="15">Hiển thị 15</option>
                            <option value="18">Hiển thị 18</option>
                        </select>
                    </div>
                    <div class="pagination">
                        {{--<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>--}}
                        {{--<a href="#" class="active">1</a>--}}
                        {{--<a href="#">2</a>--}}
                        {{--<a href="#">3</a>--}}
                        {{--<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>--}}
                        {{--<a href="#">6</a>--}}
                        {{--<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>--}}
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list" style="position: relative">
                    <div class="row" id="single_product">
                        @if (count($products) > 0)
                            @include('view.product_ajax')
                        @else
                            <p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Không có sản phẩm nào !</p>
                        @endif
                    </div>
                </section>
                <!-- End Best Seller -->

                <!-- Modal Quick Product View -->
                <!-- End Modal Quick Product View -->

                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
                        <select class="showPage">
                            <option value="9">Hiển thị 9</option>
                            <option value="12">Hiển thị 12</option>
                            <option value="15">Hiển thị 15</option>
                            <option value="18">Hiển thị 18</option>
                        </select>
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Danh mục</div>
                    <ul class="main-categories" id="style-4">
                        @if (!empty($category))
                            @foreach ($category as $val)
                                <li class="main-nav-list"><a href="{{route('show.cates', ['id' => $val->cate_slug])}}" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>{{$val->cate_name}}<span class="number"> (<?php echo count(\App\Products::where('cate_id', $val->id)->where('product_active', 0)->get()) ?>)</span></a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Lọc sản phẩm</div>
                    <div class="common-filter">
                        <div class="head">Nhãn hiệu</div>
                        <form>
                            <ul>
                                <li class="filter-list"><input class="pixel-radio brand-radio" type="radio" value="DIOR" id="apple" name="brand"><label for="apple">DIOR<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio brand-radio" type="radio" value="chanel" id="asus" name="brand"><label for="asus">CHANEL<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio brand-radio" type="radio" value="louis vuitton" id="gionee" name="brand"><label for="gionee">LOUIS VUITTON<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio brand-radio" type="radio" value="balenciaga" id="micromax" name="brand"><label for="micromax">BALENCIAGA<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio brand-radio" type="radio" value="ba&sh" id="samsung" name="brand"><label for="samsung">BA&SH<span></span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Màu</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio color-radio" type="radio" id="black" name="color" value="black"><label for="black">Black<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio color-radio" type="radio" id="balckleather" name="color" value="black leather"><label for="balckleather">Black Leather<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio color-radio" type="radio" id="blackred" name="color" value="black with red"><label for="blackred">Black with red<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio color-radio" type="radio" id="gold" name="color" value="gold"><label for="gold">Gold<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio color-radio" type="radio" id="red" name="color" value="red"><label for="red">Red<span></span></label></li>
                                <li class="filter-list"><input class="pixel-radio color-radio" type="radio" id="spacegrey" name="color" value="spacegrey"><label for="spacegrey">Spacegrey<span></span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span><div id="lower-value"></div> <div class="to">to</div>
                                <span>$</span><div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('myjs')
    <script src="{{asset('js/products-ajax.js')}}"></script>
    <script src="{{asset('fontend/js/g.js')}}"></script>
    <script src="{{asset('js/addcar.js')}}"></script>
@endsection
