@extends('layout.admin')
@section('title', 'Sản Phẩm')
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
                        <a href="{{route('show.product')}}" style="text-decoration: none;">Sản Phẩm</a>
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
                    <form class="form-horizontal form-row-seperated" action="javscript:" id="formProduct" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="actions btn-set">
                                    <a href="{{route('show.product')}}" name="back" class="btn default"><i class="fa fa-angle-left"></i> Back</a>
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
                                                Sản phẩm </a>
                                        </li>
                                        <li>
                                            <a href="#tab_detail" data-toggle="tab">
                                                Thông tin chi tiết sản phẩm </a>
                                        </li>
                                        <li class="successs" style="display: none;">
                                            <p class="successErr"></p>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <input type="hidden" id="{{$product->id}}" value="{{$product->id}}" class="inputIdpr" name="id">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tên: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$product->product_name}}" class="form-control fixctp product_name" name="product_name" placeholder="">
                                                        <span class="error product_name"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Đường dẫn: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$product->product_slug}}" class="form-control fixctp product_slug" name="product_slug" placeholder="">
                                                        <span class="error product_slug"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Mô tả: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control fixctp" name="description">{{$product->description}}</textarea>
                                                        <span class="error description"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Mô tả ngắn: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control fixctp" name="short_description">{{$product->short_description}}</textarea>
                                                        <span class="error short_description"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Danh mục: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control input-lage fixctrt" name="cate_id">
                                                            <option selected disabled value="0">Chọn danh mục...</option>
                                                            <?php showCate($parent_cate, 0, '', $product->cate_id); ?>
                                                        </select>
                                                        <span class="error cate_id"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Loại: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <label style="position: relative; top: -10px !important;" class="radio-inline"><input type="radio" @if ($product->category_name == 1) checked @endif value="1" name="category_name" checked><span style="position: relative; top: 5px;">Đồ nữ</span></label>
                                                        <label style="position: relative; top: -10px !important;" class="radio-inline"><input type="radio" @if ($product->category_name == 2) checked @endif value="2" name="category_name"><span style="position: relative; top: 5px;">Đồ nam</span></label>
                                                        <label style="position: relative; top: -10px !important;" class="radio-inline"><input type="radio" @if ($product->category_name == 0) checked @endif value="0" name="category_name"><span style="position: relative; top: 5px;">Khác</span></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Giá: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input value="{{$product->price}}" type="number" class="form-control fixctp price" name="price" placeholder="">
                                                        <span class="error price"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Khuyến mãi: <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input value="{{$product->sell_price}}" type="number" class="form-control fixctp" name="sell_price" placeholder="">
                                                        <span class="error sell_price"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Số lượng: <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input value="{{$product->amount}}" type="number" class="form-control fixctp" name="amount" placeholder="">
                                                        <span class="error amount"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ảnh: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                            <input type="file" class="form-control product_image fixctp" name="product_image" placeholder="">
                                                        <span class="error product_image"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ảnh mô tả: <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <div class="bg-danger" style="min-height: 165px;">
                                                            <p class="file">
                                                                <label for="files">Chọn nhiều file </label>
                                                                <input id="files" type="file" multiple name="product_image_thumb[]"/>
                                                            </p>
                                                            @if($product->id)
                                                                @foreach($product_image as $value)
                                                                    @if($value->image)
                                                                        <div>
                                                                        <img class='thumbnail' src="{{asset('assets/image/product_image_thumb/' . $value->image)}}"/>
                                                                        <i onclick='cler(this)' class='fas fa-times delimg'></i>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            <output id="result" />
                                                        </div>
                                                        <span class="error product_image_thumb"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Hành động: <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control input-medium" name="active">
                                                            <option @if($product->product_active == 0) selected @endif value="0">Hiện</option>
                                                            <option @if($product->product_active == 1) selected @endif value="1">Ẩn</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_detail">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Thương hiệu: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control fixctrt" name="brand">
                                                            <option selected disabled value="0">Chọn Thương Hiệu ...</option>
                                                            <option @if($product->brand == 'dior') selected @endif value="dior">DIOR</option>
                                                            <option @if($product->brand == 'chanel') selected @endif value="chanel">CHANEL</option>
                                                            <option @if($product->brand == 'louis vuitton') selected @endif value="louis vuitton">LOUIS VUITTON</option>
                                                            <option @if($product->brand == 'balenciaga') selected @endif value="balenciaga">BALENCIAGA</option>
                                                            <option @if($product->brand == 'ninomaxx') selected @endif value="ninomaxx">NINOMAXX</option>
                                                            <option @if($product->brand == 'juno') selected @endif value="juno">JUNO</option>
                                                            <option @if($product->brand == 'random') selected @endif value="random">KHÁC</option>
                                                        </select>
                                                        <span class="error err_brand"></span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Xuất xứ: <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$product->madein}}" class="form-control fixctp madein" name="madein" placeholder="">
                                                        <span class="error err_madein"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Loại: <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$product->type}}" class="form-control fixctp width" name="type" placeholder="">
                                                        <span class="error err_type"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Trọng lượng : <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="number" value="{{$product->weight}}" class="form-control fixctp weight" name="weight" placeholder="">
                                                        <span class="error err_weight"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kiểm tra chất lượng : <span class="required"></span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control" name="qualitycheck">
                                                            <option @if($product->qualitycheck == 0) selected @endif value="0">Có</option>
                                                            <option @if($product->qualitycheck == 1) selected @endif value="1">Không</option>
                                                        </select>
                                                        <span class="error err_qualitycheck"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Độ mới : <span class="required">
													</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input value="{{$product->new}}" type="number" class="form-control fixctp new" name="new" placeholder="">
                                                        <span class="error err_new"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Màu: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control fixctrt" name="color">
                                                            <option selected disabled value="0">Chọn Màu...</option>
                                                            <option @if($product->color == 'black') selected @endif value="black">Đen</option>
                                                            <option @if($product->color == 'white') selected @endif value="white">Trắng</option>
                                                            <option @if($product->color == 'orange') selected @endif value="orange">Cam</option>
                                                            <option @if($product->color == 'blue') selected @endif value="blue">Xanh lam</option>
                                                            <option @if($product->color == 'gray') selected @endif value="gray">Xám</option>
                                                            <option @if($product->color == 'green') selected @endif value="green">Xanh lục</option>
                                                            <option @if($product->color == 'red') selected @endif value="red">Đỏ</option>
                                                            <option @if($product->color == 'violet') selected @endif value="violet">Tím</option>
                                                            <option @if($product->color == 'random') selected @endif value="random">Khác</option>
                                                        </select>
                                                        <span class="error err_color"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="tab-pane" id="tab_meta">--}}
                                            {{--<div class="form-body">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="col-md-2 control-label">Meta Title:</label>--}}
                                                    {{--<div class="col-md-10">--}}
                                                        {{--<input type="text" class="form-control maxlength-handler" name="product[meta_title]" maxlength="100" placeholder="">--}}
                                                        {{--<span class="help-block">--}}
														{{--max 100 chars </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="col-md-2 control-label">Meta Keywords:</label>--}}
                                                    {{--<div class="col-md-10">--}}
                                                        {{--<textarea class="form-control maxlength-handler" rows="8" name="product[meta_keywords]" maxlength="1000"></textarea>--}}
                                                        {{--<span class="help-block">--}}
														{{--max 1000 chars </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="col-md-2 control-label">Meta Description:</label>--}}
                                                    {{--<div class="col-md-10">--}}
                                                        {{--<textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>--}}
                                                        {{--<span class="help-block">--}}
														{{--max 255 chars </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
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
        let urlUpdate = "{{route('save.update.product',[''])}}";
        let urlUadd = "{{route('save.product', [''])}}";
        $(document).ready(function(){
            $('.shopPr').addClass('active');
        });
    </script>
    <script>
        window.onload = function(){
            //Check File API support
            if(window.File && window.FileList && window.FileReader)
            {
                var filesInput = document.getElementById("files");
                filesInput.addEventListener("change", function(event){
                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");
                    for(var i = 0; i< files.length; i++)
                    {
                        var file = files[i];
                        //Only pics
                        if(!file.type.match('image'))
                            continue;
                        var picReader = new FileReader();

                        picReader.addEventListener("load",function(event){

                            var picFile = event.target;

                            var div = document.createElement("div");
                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/><i onclick='cler(this)' class='fas fa-times delimg'></i>";
                            output.insertBefore(div,null);

                        });
                        //Read the image
                        picReader.readAsDataURL(file);
                    }
                });
            }
        }
        function cler(del) {
            var rem = del.parentNode;
            rem.parentNode.removeChild(rem);
        }
    </script>
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
