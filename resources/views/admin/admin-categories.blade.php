@extends('layout.admin')
@section('title', 'Danh Mục')
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
						<a>Danh Mục</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue" style="margin-top:10px;">
						<div class="portlet-title">
							<div class="caption">
								<i class=""></i>DANH MỤC
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
                                            <a href=" {{route('add.cate')}}">
                                                <button id="" class="btn green">
                                                Thêm <i class="fal fa-plus"></i>
                                                </button>
                                            </a>
										</div>
									</div>
									<div class="col-md-6">
									</div>
								</div>
							</div>

							 <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
								<thead>
									<tr>
										<th>ID</th>
										<th>Tên Danh Mục</th>
										<th>Đường Dẫn</th>
										<th>Danh mục cha</th>
										<th style="text-align: center">Hiển Thị</th>
										<th style="text-align: center">Hành động</th>
									</tr>
								</thead>
								<tbody>

								@foreach($cate as $value)

									<tr id="{{$value->id}}">
										<td>{{$value->id}}</td>
										<td>{{$value->cate_name}}</td>
										<td>{{$value->cate_slug}}</td>
                                        @if($value->parent_id == 0)
                                            <td>{{'Danh mục gốc'}}</td>
                                            @else
                                            @for ($i = 0; $i < count($cate); $i++)
                                                @if ($value->parent_id == $cate[$i]->id)
                                                    <td>{{$cate[$i]->cate_name}}</td>
                                                @endif
                                            @endfor
                                        @endif

										<td class="center">
											<div class="toggle-button-demo">
											  <input class="toggle toggle-ios" id="toggle{{$value->id}}" @if($value->cate_active == 0) checked @endif type="checkbox" value=""/>
											  <label class="toggle-btn" for="toggle{{$value->id}}"><span>On</span></label>
											</div>
										</td>
										<td style="text-align: center">
											<a class="editcate" href="{{route('update.cate', ['id' => $value->id])}}"><i style="font-size: 20px;" class="fal fa-edit"></i></a> <span class="spacel">&nbsp;&nbsp;</span>
											<a data-title="Cảnh Báo" data-confirm-button="Xác nhận" class="deleteCate" id="{{$value->id}}">
											<i style="font-size: 20px;" class="fal fa-trash-alt"></i> </a>
										</td>
									</tr>

								@endforeach
								</tbody>
							</table>
													
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
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
