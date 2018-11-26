@extends('layout.admin')
@section('title', 'Thêm Danh Mục')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler" style="margin-top: -58px;">
                </div>
                <div class="toggler-close" style="margin-top: -50px;">
                </div>
                <div class="theme-options" style="margin-top: -50px;">
                    <div class="theme-option theme-colors clearfix">
						<span>
						MÀU TRANG WEB </span>
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
						KIỂU TRANG </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						ĐẦU TRANG </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						MENU DROP</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						CHẾ ĐỘ MENU</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						MENU </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						KIỂU MENU </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						VỊ TRÍ MENU </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						TRÂN TRANG </span>
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
                        <a href="{{route('Admin.cp')}}">Trang Chủ</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>code</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        @if (!empty($nameShow))
                            <a style="text-decoration: none;">{{$nameShow}}</a>
                        @endif
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <form id="Codeform" action="{{route('save.codecountpoin')}}" method="post" class="form-horizontal form-row-seperated">
                        {{csrf_field()}}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="actions btn-set">
                                    <a href="{{route('Admin.cp')}}" name="back" class="btn default"><i class="fa fa-angle-left"></i> Quay lại</a>
                                    <button class="btn green"><i class="fa fa-check"></i> Lưu</button>
                                    <div class="btn-group">
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                                code </a>
                                        </li>
                                        <li class="successs" style="display: none;">
                                            <p class="successErr">  </p>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">code: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control code_key fixctss" id="code_key" name="code_key" placeholder="">
                                                        <span class="error code_keyerr"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Thời hạn: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="date" class="form-control time fixctss" id="time" name="time" placeholder="">
                                                        <span class="error timeerr"></span>
                                                    </div>
                                                </div>
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="col-md-2 control-label">Loại hãng: <span class="required">--}}
													{{--* </span>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<input type="text" class="form-control code_type" id="code_type" name="code_type" placeholder="">--}}
                                                        {{--<span class="error code_type"></span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Giảm %: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control code_price fixctss" id="code_price" name="code_price" placeholder="">
                                                        <span class="error code_priceerr"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Loại đơn hàng: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control code_total fixctss" id="code_total" name="code_total" placeholder="">
                                                        <span class="error code_totalerr"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><span class="required">
													 </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <a class="btn btn-success createCode">Tạo mã</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
@section('myjavascript')
    <script>
        $('.createCode').on('click', function (e) {
            e.preventDefault();
            let code = Math.random().toString(30).substring(9);
            let r = Math.random().toString(36).substring(2);
            $('#code_key').val(r.toUpperCase() + code.toUpperCase());
        })
    </script>

    <script type="text/javascript" src="{{asset('js/js-ajax.js')}}"></script>
@endsection
