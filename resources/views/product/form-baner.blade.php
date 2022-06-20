@extends('layout.admin')
@section('title', 'Thêm Barner')
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
                        <a href="{{route('show.baner')}}">Baner</a>
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
                    <form class="form-horizontal form-row-seperated" action="javascript:" method="POST" id="banerPost">
                        {{csrf_field()}}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-shopping-cart"></i>{{$nameShow}}
                                </div>
                                <div class="actions btn-set">
                                    <a href="{{route('show.baner')}}" name="back" class="btn default"><i class="fa fa-angle-left"></i> Quay lại</a>
                                    <button type="reset" class="btn default"><i class="fa fa-reply"></i> Nhập lại</button>
                                    <button  class="btn green"><i class="fa fa-check"></i> Lưu</button>
                                    <div class="btn-group">
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                                Dữ liệu </a>
                                        </li>
                                        <li class="successs" style="display: none;">
                                            <p class="successErr"></p>
                                        </li>
                                    </ul>
                                    <input type="hidden" class="inputId" id="{{$baner->id}}" value="{{$baner->id}}" name="id">
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tiêu đề baner <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$baner->baner_title}}" class="form-control fixct baner_title" name="baner_title" placeholder="">
                                                        <span class="error baner_title_er"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nội dung: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea  class="form-control fixct baner_content" id="baner_content" name="baner_content" placeholder="">{{$baner->baner_content}}</textarea>
                                                        <span class="error baner_content_er"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nội dung 1: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control fixct baner_content_one" id="baner_content_one" name="baner_content_one" placeholder="">{{$baner->baner_content_one}}</textarea>
                                                        <span class="error baner_content_one_er"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nội dung 2: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control fixct baner_content_two" id="baner_content_two" name="baner_content_two" placeholder="">{{$baner->baner_content_two}}</textarea>
                                                        <span class="error baner_content_two_er"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ảnh: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control fixct baner_image" name="baner_image" placeholder="">
                                                        <span class="error baner_image_er"></span>
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
    <script type="text/javascript">
        let urlUpdate = "{{route('save.banerUpdate')}}";
        let urlUadd = "{{route('save.baner')}}";
    </script>
    <script type="text/javascript" src="{{asset('js/js-ajax.js')}}"></script>
@endsection
