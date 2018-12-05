@extends('layout.layout-fontend.index')
@section('title', 'Giỏ hàng')
@section('baner')
    @include('layout.layout-fontend.baner-sub', ['name_show' => 'Giỏ hàng', 'name_page' => 'Trang Giỏ Hàng'])
@endsection

@section('contents')

    <!-- Start Cart Area -->
    <div class="container">
        <div class="cart-title">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="ml-15">Sản phẩm</h6>
                </div>
                <div class="col-md-2">
                    <h6>Giá</h6>
                </div>
                <div class="col-md-2">
                    <h6>Số lượng</h6>
                </div>
                <div class="col-md-2">
                    <h6>Tổng</h6>
                </div>
                <div class="col-md-2 text-center">
                    <h6 class="action"><a style="font-size: 15px;" href="{{route('delete.card')}}"><i class="fa fa-trash-o"></i> Xóa hết</a></h6>
                </div>
            </div>
        </div>

        @if(!empty($carts) || $carts != '' || $carts != null)
            @foreach($carts as $cart)
                <div class="cart-single-item">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12">
                            <div class="product-item d-flex align-items-center">
                                <img style="width: 70px;" src="{{asset('assets/image/product_image/'. $cart['image'])}}" class="img-fluid" alt="">
                                <h6>{{$cart['name']}}</h6>
                            </div>
                        </div>
                        <div class="col-md-2 col-6 parentprice">
                            <div data="{{$cart['price']}}" class="price">{{number_format($cart['price'], 0,"",".")}} VNĐ</div>
                        </div>
                        <div class="col-md-2 col-6" id="findButtons">
                            <div class="quantity-container d-flex align-items-center mt-15">
                                <input id="{{$cart['id']}}" type="text" class="quantity-amount getquantity" value="{{$cart['quantity']}}" />
                                <div data="{{route('show.card')}}" id="findButton" class="arrow-btn d-inline-flex flex-column">
                                    <button id="nv" class="arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                    <button id="pv" class="arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 parentTotal">
                            <div data="{{$cart['price'] * $cart['quantity']}}" class="total">{{number_format($cart['price'] * $cart['quantity'], 0, ',', '.')}} VNĐ</div>
                       @if (!empty($countPoin))
                                <?php $total += $cart['quantity']*$cart['price'] * (100 - $countPoin->count_price)/100?>
                          @else
                                <?php $total += $cart['quantity']*$cart['price']?>
                            @endif
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="text-center">
                                <div class="action"><a href="{{route('delete.onecart', ['id' => $cart['id']])}}"><i class="fa fa-trash-o"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="cart-single-item">
                <div class="row align-items-center">
                    <p class="m-auto">Giỏ hàng của bạn hiện chưa có sản phẩm nào</p>
                </div>
            </div>
        @endif

        <div class="cupon-area d-flex align-items-center justify-content-end flex-wrap">
            @if(Session::get('succ') != '')
                <p class="text-success" style="position: absolute; margin-left: -600px;">{{Session::get('succ')}}</p>
            @endif
            @if(Session::get('smg') != '')
                <p style="color:crimson; position: absolute; margin-left: -600px;">{{Session::get('smg')}}</p>
            @endif

                <!-- <a href="#" class="view-btn color-2"><span>Update Cart</span></a> -->
            <div class="cuppon-wrap d-flex align-items-center flex-wrap">
                <div class="cupon-code">
                    <form action="{{route('add.count')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="counpoin">
                        <button class="view-btn color-2"><span>Sử dụng</span></button>
                    </form>
                </div>
                <a href="#" class="view-btn color-2 have-btn"><span>Mã giảm giá</span></a>
            </div>
        </div>
        <div class="subtotal-area d-flex align-items-center justify-content-end">
            <div class="title text-uppercase">tổng Tất cả</div>
            <div data="{{$total}}" class="subtotal"><span>{{number_format($total, 0,",",".")}}</span> VNĐ</div>
            <input type="hidden" id="totalsNumbe" value="{{number_format($total, 0,'', '')}}">
        </div>
        <div class="shipping-area d-flex justify-content-end">
            <div class="tile text-uppercase mr-50">Vận chuyển</div>
            <form action="{{route('check.onecart')}}" method="get" class="d-inline-flex flex-column align-items-end ml-50">
                <ul class="d-flex flex-column align-items-end">
                    <li class="filter-list">
                        <label for="flat-rate">Trong ngày : <span>50.000đ</span></label>
                        <input value="1" class="pixel-radio" type="radio" id="flat-rate" name="brand">
                    </li>
                    <li class="filter-list">
                        <label for="free-shipping">Miễn phí (1 tuần)</label>
                        <input value="0" class="pixel-radio" checked type="radio" id="free-shipping" name="brand">
                    </li>
                    <!-- <li class="filter-list">
                        <label for="flat-rate-2">Flat Rate:<span>$10.00</span></label>
                        <input class="pixel-radio" type="radio" id="flat-rate-2" name="brand">
                    </li> -->
                    <li class="filter-list">
                        <label for="local-delivery">Địa phương : <span>30.000đ</span></label>
                        <input value="2" class="pixel-radio" type="radio" id="local-delivery" name="brand">
                    </li>
                    <!-- <li class="calculate">Tính toán giao hàng</li> -->
                </ul>
                <!-- <div class="sorting">
                    <select>
                        <option value="1">Hà Nội</option>
                        <option value="1">Hồ Chí Minh</option>
                        <option value="1">Srilanka</option>
                    </select>
                </div>
                <div class="sorting mt-20">
                    <select>
                        <option value="1">Hà Nội</option>
                        <option value="1">TP.Hồ Chí Minh</option>
                        <option value="1">Select a State</option>
                    </select>
                </div>
                <input type="text" placeholder="Postcode/Zipcode" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/Zipcode'" required class="common-input mt-10"> -->
                <button @if($total == 0) disabled @endif class="view-btn color-2 mt-10"><span>Mua hàng</span></button>
            </form>

        </div>
    </div>
    <!-- End Cart Area -->

@endsection
@section('myjs')
    <script src="{{asset('js/products-ajax.js')}}"></script>
    <script src="{{asset('fontend/js/g.js')}}"></script>
@endsection


