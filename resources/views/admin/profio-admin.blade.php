@extends('layout.admin')
@section('title', 'Thông tin')
@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="theme-panel hidden-xs hidden-sm hide">
                <div class="toggler">
                </div>
                <div class="toggler-close">
                </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
                            </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
                            </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
                            </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
                            </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
                            </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
                            </li>
                        </ul>
                    </div>
                    <div class="theme-option">
						<span>
						Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{route('Admin.cp')}}">Trang chủ</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Thông tin</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row margin-top-20">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                    <!-- PORTLET MAIN -->
                                <div class="portlet light">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <div class="profile-userpic" style="float: left; padding-right: 30px;">
                                                @if($user->avatar == '' || $user->avatar == null)
                                                    <img style="width: 140px;" src="{{asset('assets/image/null_avatar/fb.jpg')}}" id="prev" class="img-responsive" alt="">
                                                @else
                                                    <img style="width: 140px;" src="{{asset('assets/image/avatar/' .$user->avatar)}}" id="prev" class="img-responsive" alt="">
                                                @endif
                                            </div>
                                            <span class="caption-subject font-blue-madison bold uppercase">Thông tin</span>
                                            <form method="post" style="margin-left: 170px; margin-top: 10px;" action="{{route('save.avatar')}}" role="form" enctype="multipart/form-data">
                                               {{csrf_field()}}
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input onchange="document.getElementById('prev').src = window.URL.createObjectURL(this.files[0])" type="file" class="fileav" name="avatar">
																</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="margin-top-10">
                                                    <button style="margin-right: 30px;" class="btn green-haze">
                                                        Lưu </button>
                                                    @if(session('flash_message') != '')
                                                      <span class="text-success ml-3" style="font-size: 15px;">{{session('flash_message')}}</span>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Thông tin</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Đổi mật khẩu</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                @if ($show == false)
                                                    <div class="col-md-12 col-lg-10">
                                                        <div class="col-md-6">
                                                            <div class="form-inline" style="margin-bottom: 15px;">
                                                                <label style="width: 120px;" class="control-label">Tên: </label>
                                                                <span style="font-weight: bold; font-size: 16px; position: relative; top: 2px;">
                                                                {{$user->first_name}}{{$user->name}}
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-inline" style="margin-bottom: 15px;">
                                                                <label style="width: 120px;" class="control-label">Email:</label>
                                                                <span style="font-weight: bold; font-size: 16px; position: relative; top: 2px;">
                                                                {{$user->email}}
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-inline" style="margin-bottom: 15px;">
                                                                <label style="width: 120px;" class="control-label">Giới tính:</label>
                                                                <span style="font-weight: bold; font-size: 16px; position: relative; top: 2px;">
                                                                {{$user_address->gender}}
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-inline" style="margin-bottom: 15px;">
                                                                <label style="width: 120px;" class="control-label">Tỉnh - Thành phố:</label>
                                                                <span style="font-weight: bold; font-size: 16px; position: relative; top: 2px;">
                                                                    {{$user_address->province}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-inline" style="margin-bottom: 15px;">
                                                                <label style="width: 120px;" class="control-label">Số điện thoại:</label>
                                                                <span style="font-weight: bold; font-size: 16px; position: relative; top: 2px;">
                                                                                {{$user_address->phone}}
                                                        </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-inline" style="margin-bottom: 15px;">
                                                                <label style="width: 120px;" class="control-label">Địa chỉ:</label>
                                                                <span style="font-weight: bold; font-size: 16px; position: relative; top: 2px;">
                                                                    {{$user_address->ward}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    @else
                                                    <form role="form" action="{{route('save.info')}}" method="post">
                                                        {{csrf_field()}}
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name</label>
                                                                <input name="first Name" value="{{$user->first_name}}" type="text" placeholder="John" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name</label>
                                                                <input name="name" value="{{$user->name}}" type="text" placeholder="Doe" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Số điện thọai</label>
                                                                <input name="phone" value="{{$user_address->phone}}" type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Giới tính</label>
                                                                <select name="gender" id="" class="form-control">
                                                                    <option selected disabled value="0">Chọn giới tính</option>
                                                                    <option @if($user_address->gender == 'Nam') selected @endif value="Nam">Nam</option>
                                                                    <option @if($user_address->gender == 'Nữ') selected @endif value="Nữ">Nữ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Tỉnh - Thành phố</label>
                                                                <input name="province" value="{{$user_address->province}}" type="text" placeholder="Tỉnh - Thành phố" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Địa chỉ</label>
                                                                <input name="ward" value="{{$user_address->ward}}" type="text" placeholder="Địa chỉ" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="margiv-top-10">
                                                                <button class="btn green-haze">
                                                                    Lưu </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="clearfix"></div>
                                                @endif
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <form class="savePass" action="{{route('save.pass')}}" method="post">
                                                    {{csrf_field()}}
                                                    <div class="form-group" style="width: 400px;">
                                                        <p style="font-size: 16px;" class="showsuccess text-success"></p>
                                                        <label class="control-label">Mật khẩu cũ</label>
                                                        <input type="password" name="password" class="null form-control"/>
                                                        <span class="error errpassword"></span>
                                                    </div>
                                                    <div class="form-group" style="width: 400px;">
                                                        <label class="control-label">Mật khẩu mới</label>
                                                        <input type="password" name="new_password" class="null form-control"/>
                                                        <span class="error errnew_password"></span>
                                                    </div>
                                                    <div class="form-group" style="width: 400px;">
                                                        <label class="control-label">Nhập lại mật khẩu mới</label>
                                                        <input type="password" name="password_confirmation" class="null form-control"/>
                                                        <span class="error errpassword_confirmation"></span>
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <button class="btn green-haze">
                                                            Lưu </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END PRIVACY SETTINGS TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

@section('myjavascript')
    <script type="text/javascript" src="{{asset('js/js-ajax.js')}}"></script>

@endsection
