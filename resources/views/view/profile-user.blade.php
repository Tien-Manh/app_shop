@extends('layout.layout-fontend.index')
@section('title', 'Thông tin')
@section('baner')
    @include('layout.layout-fontend.baner-sub', ['name_page' => 'Thông Tin', 'name_show' => 'Thông tin cá nhân'])
@endsection
@section('contents')
    <div class="col-8 float-left container">
        <form action="#" class="billing-form">
            <div class="my-account-section row">
                <div class="my-account-header col-lg-12 mb-30">
                    <h3 class="billing-title mt-20 mb-10">Thông tin chi tiết</h3>
                </div>
                <div class="my-account-content col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <label class="col-lg-4 my-label">Họ và tên</label>
                                <p class="col-lg-6 my-profile">{{$user->first_name}} {{$user->name}}</p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label">Email</label>
                                <p class="col-lg-6 my-profile">{{$user_address->email}}</p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label">Số điện thoại</label>
                                <p class="col-lg-6 my-profile">{{$user_address->phone}}</p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label">Giới tính</label>
                                <p class="col-lg-6 my-profile">{{$user_address->gender}}</p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label">Tình - Thành phố</label>
                                <p class="col-lg-6 my-profile">{{$user_address->province}}</p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label">Địa chỉ</label>
                                <p class="col-lg-6 my-profile">{{$user_address->ward}}</p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label">Mật khẩu</label>
                                <p class="col-lg-6 my-profile"><a href="{{route('change.pass')}}">Bạn muốn đổi mật khẩu?</a></p>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 my-label"></label>
                                <div class="col-lg-12 my-setting-pro">
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="view-btn color-2 "><span>Sửa</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-4 float-left container">
        <form method="post" style=" margin-left: 0px; margin-top: 40px;" action="{{route('save.avatar')}}" role="form" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="my-img-pro" style="margin: auto">
                <div style="width: 170px; margin: auto; height: 210px; border-radius: 50%; overflow: hidden">
                    <img id="viewImg" style="width: 100%; height: 100%;" src="{{asset('assets/image/avatar/' . $user->avatar)}}">
                </div>
                <div class="clear"></div>
                <a style="width: 258px; margin-left:30px; " class="view-btn color-2 mt-20"><span>
                            <input onchange="document.getElementById('viewImg').src = window.URL.createObjectURL(this.files[0])" style="width: 255px;background: none;font-size: 12px;cursor: pointer; position: relative; left: -40px;" type="file" class="" name="avatar">
                                 <a style="margin: auto; display: none; min-width: 120px; padding: 0px; margin-left: 28px;" class="view-btn color-2 mt-10 kkk">
                                 <span> <button class="lpp" style="width: 120px; border: none;background: transparent; cursor: pointer"> Lưu</button>
                          </span>
                            </a>
                               <a style="margin: auto; display: none; min-width: 120px;margin-left: 14px; padding: 0px;" class="view-btn color-2 mt-10 ryy">
                                <span>Chọn lại</span>
                            </a>
                     </span>
                    <div class="clear"></div>
                    <br>

                @if(session('flash_message') != '')
                        <span class="text-success text-center" style="font-size: 15px; text-align: center;margin-left: 30px; ">{{session('flash_message')}}</span>
                    @endif
                </a>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="container" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-quick-view my-update">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="quick-view-content " >
                                <div class="top mb-2">
                                    <h3 class="">Cập nhật thông tin</h3>
                                </div>
                                <form method="post" action="{{route('save.info')}}" class="offset-md-3">
                                    {{csrf_field()}}
                                    <div class="bottom row">
                                        <div class="col-lg-6">
                                            <input name="first_name" @if($user_address->first_name != '') disabled @endif type="text" placeholder="First name*" value="{{$user_address->first_name}}" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" required class="common-input">
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="name" disabled type="text" placeholder="Last name*" onfocus="this.placeholder=''" value="{{$user_address->name}}" onblur="this.placeholder = 'Last name*'" required class="common-input">
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="email" @if($user_address->email != '') disabled @endif type="email" placeholder="Địa chỉ email*" onfocus="this.placeholder=''" value="{{$user_address->email}}" onblur="this.placeholder = 'Địa chỉ email*'" required class="common-input">
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="phone" type="text" placeholder="Số điện thoại*" onfocus="this.placeholder=''" value="{{$user_address->phone}}" onblur="this.placeholder = 'Số điện thoại*'" required class="common-input">
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="province" type="text" placeholder="Tỉnh - Thành*" onfocus="this.placeholder=''" value="{{$user_address->province}}" onblur="this.placeholder = 'Tỉnh - Thành*'" required class="common-input">
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="ward" placeholder="Địa chỉ" onfocus="this.placeholder=''"  onblur="this.placeholder = 'Địa chỉ'" required class="common-textarea">{{$user_address->ward}}</textarea>
                                        </div>
                                        <div class="col-lg-12 row">
                                            <label class="col-lg-2 ml-30 mt-20 mb-20">Giới tính</label>
                                            <ul class="d-flex flex-column col-lg-6 mt-20">
                                                <li class="filter-list">
                                                    <input value="Nam" @if($user_address->gender == 'Nam') checked  @endif class="pixel-radio" type="radio" id="free-shipping" name="gender">
                                                    <label for="free-shipping">Nam</label>
                                                </li>
                                                <li class="filter-list">
                                                    <input value="Nữ" @if($user_address->gender == 'Nữ') checked  @endif class="pixel-radio" type="radio" id="local-delivery" name="gender">
                                                    <label for="local-delivery">Nữ</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 my-setting-pro">
                                            <button class="view-btn color-2"><span>Cập nhật</span></button>
                                        </div>

                                    </div>
                                </form>
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


    <script type="text/javascript">
        $('input[type="file"]').on('change', function () {
            $(this).hide();
            $('.kkk').show();
            $('.ryy').show();
        })
        $('.ryy').on('click', function () {
            $('input[type="file"]').show();
            $('.kkk').hide();
            $('.ryy').hide();
        })
    </script>
@endsection
