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
                        <a href="{{route('show.cate')}}">Danh Mục</a>
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
                    <form class="form-horizontal form-row-seperated" action="javascript:" method="POST" id="frm-cate-insert">
                        {{csrf_field()}}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-shopping-cart"></i>Thêm danh mục
                                </div>
                                <div class="actions btn-set">
                                    <a href="{{route('show.cate')}}" name="back" class="btn default"><i class="fa fa-angle-left"></i> Quay lại</a>
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
                                    <input type="hidden" class="inputId" id="{{$cate->id}}" value="{{$cate->id}}" name="id">
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tên danh mục: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$cate->cate_name}}" class="form-control fixct cate_name" id="cate_name" name="cate_name" placeholder="">
                                                      <span class="error errorname"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Danh mục cha: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10" style="width: 65.2%">
                                                        <select class="table-group-action-input form-control input-lage" name="parent_id">
                                                            <option class="cateid" selected disabled value="-1">Chọn danh mục cha...</option>
                                                            <option value="0">Danh mục gốc</option>
1                                                            <?php showCate($parent_cate, 0, '', $cate->parent_id); ?>
                                                        </select>
                                                        <span class="error errorparent_id"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Đường dẫn: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$cate->cate_slug}}" class="form-control fixct cate_slug" name="cate_slug" placeholder="">
                                                        <span class="error errorslug"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ảnh: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control fixct cate_image" name="cate_image" placeholder="">
                                                        <span class="error errorsimage"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ẩn: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control input-medium" name="cate_active">
                                                            <option @if($cate->cate_active == 0) selected @endif value="0">Hiện</option>
                                                            <option @if($cate->cate_active == 1) selected @endif value="1">Ẩn</option>
                                                        </select>
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
        let urlUpdate = "{{route('save.cate.update')}}";
        let urlUadd = "{{route('save.cate')}}";
    </script>
    <script type="text/javascript" src="{{asset('js/js-ajax.js')}}"></script>
@endsection
