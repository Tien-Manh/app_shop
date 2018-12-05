@extends('layout.layout-fontend.index')
@section('title', 'Chi tiết sản phẩm')
@section('baner')
    @include('layout.layout-fontend.baner-sub', ['name_show' => 'Thanh toán', 'name_page' => 'Trang Thanh Toán'])
@endsection

@section('contents')

    <!-- Start Cart Area -->
<div class="container">
    <form action="{{route('save.cart')}}" method="POST" class="billing-form">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div>
                    @if(session('msg') != "")
                     <span class="text-success">{{session('msg')}}</span>
                        @elseif(session('msger') != "")
                     <span class="text-danger">{{session('msger')}}</span>
                    @endif
                </div>
                @if(!empty($user))
                <h3 class="billing-title mt-20 mb-10">Thông tin chi tiết</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" name="first_name" placeholder="Họ*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Họ*'" required class="common-input">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" value="{{$user->name}}" name="last_name" placeholder="Tên" onfocus="this.placeholder=''" onblur="this.placeholder = 'Đệm'" required class="common-input">
                    </div>
                    <div class="col-lg-6">
                        <label style="margin-left: 38px; cursor: pointer; margin-top: 20px;" for="local-delivery">Nam </label>
                        <input @if($address->gender == 'Nam') checked @elseif (empty($address->gender)) checked @endif style="position: relative; top: 5px; left: 10px;" value="Nam"  class="pixel-radio" type="radio" id="local-delivery" name="gender">
                    </div>
                    <div class="col-lg-6">
                        <label style="margin-left: 38px; cursor: pointer; margin-top: 20px;" for="local-delivery-n">Nữ </label>
                        <input @if($address->gender == 'Nữ') checked @endif style="position: relative; top: 5px; left: 10px;" value="Nữ" class="pixel-radio" type="radio" id="local-delivery-n" name="gender">
                    </div>
                    <div class="col-lg-12">
                        <input name="date_order" type="date" required class="common-input" placeholder="Ngày nhận &nbsp;">
                    </div>
                    <div class="col-lg-6">
                        <input name="number_phone" value="{{$address->phone}}" type="text" placeholder="Số điện thoại*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Số điện thoại*'" required class="common-input">
                    </div>
                    <div class="col-lg-6">
                        <input name="email" value="{{$user->email}}" type="email" placeholder="Địa chỉ email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Địa chỉ email*'" required class="common-input">
                    </div>
                    <div class="col-lg-12">
                        <input name="province" value="{{$address->province}}" type="text" placeholder="Thành phố*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Thành phố*'" required class="common-input">
                    </div>
                    <div class="col-lg-12">
                        <input name="ward" value="{{$address->ward}}" type="text" placeholder="Quận/Huyện*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Quận/Huyện*'" required class="common-input">
                    </div>
                    <div class="col-lg-12 mb-10">
                        <input name="commune" type="text" placeholder="Địa chỉ*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Địa chỉ*'" required class="common-input">
                    </div>
                    <div class="col-lg-12 mb-10">
                        <textarea name="message" id="" placeholder="Lời nhắn*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Lời nhắn*'" required class="common-input"></textarea>
                    </div>
                    @endif
                    {{--<div class="col-lg-12">--}}
                        {{--<div class="sorting">--}}
                            {{--<select>--}}
                                {{--<option value="1">Quốc gia*</option>--}}
                                {{--<option value="1">Anh</option>--}}
                                {{--<option value="1">Việt Nam</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<div class="sorting">--}}
                            {{--<select>--}}
                                {{--<option value="1">Thành phố*</option>--}}
                                {{--<option value="1">Hà Nội</option>--}}
                                {{--<option value="1">Hồ Chí Minh</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<div class="sorting">--}}
                            {{--<select>--}}
                                {{--<option value="1">Quận/huyện*</option>--}}
                                {{--<option value="1">Hoàn Kiếm</option>--}}
                                {{--<option value="1">Ba Đình</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
                <!-- <h3 class="billing-title mt-20 mb-10">Billing Details</h3> -->
                <!-- <div class="mt-20">
                    <input type="checkbox" class="pixel-checkbox" id="login-6">
                    <label for="login-6">Ship to a different address?</label>
                </div> -->
                <!-- <textarea  placeholder="Order Notes" onfocus="this.placeholder=''" onblur="this.placeholder = 'Order Notes'" required class="common-textarea"></textarea> -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="order-wrapper mt-50">
                    <h3 class="billing-title mb-10">Đơn hàng</h3>
                        <div class="order-list">
                                <div class="list-row d-flex justify-content-between">
                                    <div style="width: 130px;">Sản phẩm</div>
                                    <div>Số lượng</div>
                                    <div>Tổng</div>
                                </div>
                            @if($carts != '' || $carts != null)
                                    @foreach($carts as $cart)
                                        <div class="list-row d-flex justify-content-between">
                                            <div style="width: 195px;">{{$cart['name']}}</div>
                                            <div>{{$cart['quantity']}}</div>
                                            <div>{{number_format($cart['price'] * $cart['quantity'], 0,"",".")}} VNĐ</div>
                                        </div>
                                            @if (!empty($countPoin))
                                                <?php $total += $cart['quantity']*$cart['price'] * (100 - $countPoin->count_price)/100?>
                                            @else
                                                <?php $total += $cart['quantity']*$cart['price']?>
                                            @endif
                                     @endforeach
                                @else
                                <div class="text-center">Giỏ hàng trống</div>
                            @endif
                                <div class="list-row d-flex justify-content-between">
                                    <h6>Tạm tính</h6>
                                    <div><span>{{number_format($total, 0,"",".")}}</span> VNĐ</div>
                                </div>
                                <input type="hidden" name="brand" value="{{$showDiv}}">
                                <div class="list-row d-flex justify-content-between" id="showIS">
                                 @if($showDiv == '1')
                                    <h6>Vận chuyển</h6>
                                    <div>Trong ngày : 50.000đ</div>
                                  @elseif($showDiv == '0')
                                    <h6>Miễn phí (1 tuần)</h6>
                                    <div>Khoảng 1 tuần : Free</div>
                                  @elseif($showDiv == '2')
                                    <h6>Địa phương</h6>
                                    <div>Địa phương : 30.000đ</div>
                                  @endif
                                </div>
                                <div class="list-row d-flex justify-content-between">
                                    <h6>Thành tiền</h6>
                                   @if($total != 0 || $total != '')
                                        @if ($showDiv == '1')
                                            <div class="total">{{number_format($total + 50000, 0,"",".")}} VNĐ</div>
                                            @elseif($showDiv == '0');
                                              <div class="total">{{number_format($total, 0,"",".")}} VNĐ</div>
                                            @elseif ($showDiv == '2')
                                            <div class="total">{{number_format($total + 30000, 0,"",".")}} VNĐ</div>
                                        @endif
                                   @else
                                        <div class="total"></div>
                                    @endif
                                </div>

                                <!-- <div class="d-flex align-items-center mt-10">
                                    <input class="pixel-radio" type="radio" id="check" name="brand">
                                    <label for="check" class="bold-lable">Check payments</label>
                                </div>
                                <p class="payment-info">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input class="pixel-radio" type="radio" id="paypal" name="brand">
                                        <label for="paypal" class="bold-lable">Paypal</label>
                                    </div>
                                    <img src="img/organic-food/pm.jpg" alt="" class="img-fluid">
                                </div>
                                <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                <div class="mt-20 d-flex align-items-start">
                                    <input type="checkbox" class="pixel-checkbox" id="login-4">
                                    <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label>
                                </div> -->
                                <button class="view-btn color-2 w-100 mt-20"><span>Đặt mua</span></button>
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End Cart Area -->


@endsection
@section('myjs')
    <script src="{{asset('js/products-ajax.js')}}"></script>
    <script src="{{asset('fontend/js/g.js')}}"></script>
@endsection


