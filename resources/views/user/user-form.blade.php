@extends('layout.admin')
@section('title', 'Tài Khoản')
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
                        <a href="{{route('show.userAdmin')}}" style="text-decoration: none;">Quản Lý Tài Khoản</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a style="text-decoration: none;">Thêm Tài Khoản</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="{{route('save.user')}}" id="formuser" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="actions btn-set">
                                    <a href="{{route('show.userAdmin')}}" name="back" class="btn default"><i class="fa fa-angle-left"></i> Back</a>
                                    <button class="btn default"><i class="fa fa-reply"></i> Reset</button>
                                    <button class="btn green"><i class="fa fa-check"></i> Save</button>
                                    <div class="btn-group">
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                                Tài khoản </a>
                                        </li>
                                        <li class="successs text-success" style="display: none;">
                                        </li>

                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <input type="hidden" id="" value="" class="inputIdpr" name="id">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Họ tên <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" value="" class="form-control fixctp add_name" name="add_name" placeholder="">
                                                        <span class="error add_name_err"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tên đăng nhập<span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" value="" class="form-control fixctp add_name_login" name="add_name_login" placeholder="">
                                                        <span class="error add_name_login_err"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" value="" class="form-control fixctp add_email" name="add_email" placeholder="">
                                                        <span class="error add_email_err"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Chức vụ: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select class="table-group-action-input form-control input-lage fixctrt" name="add_role">
                                                            <option selected  value="1">Mod</option>
                                                        </select>
                                                     </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Mật khẩu <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="password" value="" class="form-control fixctp add_password" name="add_password" placeholder="">
                                                        <span class="error add_password_err"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nhập lại mật khẩu <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="password" value="" class="form-control fixctp add_password_confir" name="add_password_confir" placeholder="">
                                                        <span class="error add_password_confir_err"></span>
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
    <script type="text/javascript" src="{{asset('js/js-ajax-product.js')}}"></script>
    {{--<script>--}}
    {{--tinymce.init({--}}
    {{--selector: '.editor',--}}
    {{--plugins: [--}}
    {{--"advlist autolink link image lists charmap print preview hr anchor pagebreak",--}}
    {{--"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",--}}
    {{--"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"--}}
    {{--],--}}
    {{--toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",--}}
    {{--toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",--}}
    {{--image_advtab: true ,--}}
    {{--toolbar_items_size: 'small',--}}
    {{--external_filemanager_path:"/filemanager/",--}}
    {{--filemanager_title:"Responsive Filemanager" ,--}}
    {{--// external_plugins: { "code" : "/filemanager/plugin.min.js"}--}}
    {{--});--}}
    {{--</script>--}}
@endsection
