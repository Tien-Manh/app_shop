@extends('layout.admin')
@section('title', 'Sản Phẩm')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">

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
                        <ul>p
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
                        <a>Barner</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row" style="margin-top: 30px;">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet grey-cascade box">
                        <div class="portlet-title">
                            <div class="caption">
                                Baner
                            </div>
                            <div class="actions">
                                    <a href="{{route('add.baner')}}" class="btn btn-default btn-sm">
                                        <i class="fa fa-pencil"></i> Thêm Baner </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Ảnh
                                    </th>
                                    <th>
                                        Tiêu đề
                                    </th>
                                    <th>
                                        Nội dung
                                    </th>
                                    <th>
                                        Nội dung 1
                                    </th>
                                    <th>
                                        Nội dung 2
                                    </th>
                                    <th>
                                        Hiển thị
                                    </th>
                                    <th>
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($baner as $value)
                                    <tr id="{{$value->id}}">
                                        <td>
                                            {{$value->id}}
                                        </td>
                                        <td>
                                            <img style="width: 50px;" class="" src="{{asset('assets/image/baner_image/' . $value->baner_image)}}" alt="">
                                            <span>&nbsp</span>
                                        </td>
                                        <td>
                                            {{$value->baner_title}}
                                        </td>
                                        <td>
                                            {{$value->baner_content}}
                                        </td>
                                        <td>
                                            {{$value->baner_content_one}}
                                        </td>
                                        <td>
                                            {{$value->baner_content_two}}
                                        </td>
                                        <td class="text-center">
                                           @if($value->active == 0)
                                                <a name="{{$value->id}}" class="btn btn-sm btn-danger putRadio">Sử dụng</a>
                                            @else
                                                <a id="" class="btn btn-sm btn-success putRadio noActive GGG">Đang dùng</a>
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            <a class="editbaner" href="{{route('update.baner', ['id' => $value->id])}}"><i style="font-size: 20px;" class="fal fa-edit"></i></a> <span class="spacel">&nbsp
                                                <a data-title="Cảnh Báo" data-confirm-button="Xác nhận" class="deleteBaner" id="{{$value->id}}">
                                                <i style="font-size: 20px;" class="fal fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
    </div>
    <!-- END CONTENT -->
@endsection

@section('myjavascript')
    <script type="text/javascript" src="{{asset('js/js-ajax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/js-config.js')}}"></script>
@endsection
