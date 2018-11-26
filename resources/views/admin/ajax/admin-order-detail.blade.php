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
                        <a href="{{route('show.order')}}">Đơn hàng</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Chi tiết</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div style="margin-top: 20px;" class="col-md-12 col-sm-12 mt-5">
                    <div class="portlet blue-hoki box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Thông tin khách hàng
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                    Tên khách hàng
                                </div>
                                <div class="col-md-10 value">
                                    {{$customer->first_name}}&nbsp; {{$customer->last_name}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                    Giới tính:
                                </div>
                                <div class="col-md-10 value">
                                    {{$customer->gender}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                    Email:
                                </div>
                                <div class="col-md-10 value">
                                    {{$customer->email}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                    Số điện thoại:
                                </div>
                                <div class="col-md-10 value">
                                    {{$customer->phone}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                    Địa chỉ:
                                </div>
                                <div class="col-md-10 value">
                                    {{$customer->province}} - {{$customer->ward}} - {{$customer->commune}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                    Tin nhắn:
                                </div>
                                <div class="col-md-10 value">
                                    {{$cart->message}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-2 name">
                                   Ngày đặt:
                                </div>
                                <div class="col-md-10 value">
                                    {{$customer->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet grey-cascade box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Chi tiết đơn hàng
                            </div>
                            <div class="actions">
                                @if($cart->order_active == 0)
                                    <a href="javascript:;" class="btn btn-default btn-sm order_active" id="{{$cart->id}}">
                                        <i class="fa fa-pencil"></i> Xác nhận </a>
                                @else
                                    <a style="cursor: not-allowed" class="btn btn-default btn-sm order_not_active"> Đã xác nhận </a>
                                @endif
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                           Tên sản phẩm
                                        </th>
                                        <th>
                                            Số lượng
                                        </th>
                                        <th>
                                           Giá
                                        </th>
                                        <th>
                                            Tổng giá
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($order_details as $order_detail)
                                       <tr>
                                           <td>
                                               {{$order_detail->id}}
                                           </td>
                                           <td>
                                            <img style="width: 50px;" class="" src="{{asset('assets/image/product_image/' . $order_detail->product_image)}}" alt="">
                                              <span>&nbsp</span>
                                               {{$order_detail->product_name}}
                                           </td>
                                           <td>
                                               {{$order_detail->quantity}}
                                           </td>
                                           <td>
                                               {{number_format($order_detail->unit_price)}} VNĐ
                                           </td>
                                           <td>
                                               {{number_format($order_detail->unit_price * $order_detail->quantity)}} VNĐ
                                           </td>
                                       </tr>
                                   @endforeach
                                    </tbody>
                                </table>
                            </div>
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
