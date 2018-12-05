<div class="page1">{!! $products->links() !!}</div>
<div class="clearfix"></div>
@foreach($products as $product)
    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
        <div class="content">
            <div class="content-overlay"></div>
            <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/image/product_image/' . $product->product_image)}}" alt="">
            <div class="content-details fadeIn-bottom">
                <div class="bottom d-flex align-items-center justify-content-center">
                    @if (!empty(Auth::user()))
                        @if(!empty(\App\Likeview::where('prodct_id', $product->id)->where('user_id', Auth::user()->id)->first()['user_id']))
                            <a class="likeview"><span style="cursor:pointer; color: crimson; text-shadow:0 0 3px white, 0 0 5px white;" class="fa fa-heart"> &nbsp </span><span class="text-white viewCount">@if(count(\App\Likeview::where('prodct_id', $product->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $product->id)->get())}} @endif</span></a>
                        @else
                            <a href="{{route('add.like', ['id' => $product->id])}}" class="likeview"><span class="far fa-heart"> &nbsp @if(count(\App\Likeview::where('prodct_id', $product->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $product->id)->get())}} @endif</span></a>
                        @endif
                    @else
                        <a style="cursor: pointer;" class=""><span class="far fa-heart"> &nbsp @if(count(\App\Likeview::where('prodct_id', $product->id)->get()) == 0) {{''}} @else {{count(\App\Likeview::where('prodct_id', $product->id)->get())}} @endif</span></a>
                    @endif
                    <a href="{{route('view.show.detail', ['id' => $product->product_slug])}}"><span class="lnr lnr-layers"></span></a>
                    <a href="javascript:" class="hie" style="position: absolute; cursor: wait; left: 66%;background-color: transparent; width: 27.5%; display: none"><span style="opacity: 0;" class="lnr lnr-cart"></span></a>
                    <a href="javascript:" class="cartCk" id="{{$product->id}}"><span class="lnr lnr-cart"></span></a>
                </div>
            </div>
        </div>
        <div class="price">
             <h5>{{$product->product_name}}</h5>
            @if($product->sell_price == '' || empty($product->sell_price) || $product->sell_price == null || $product->sell_price == 0)
                <h3>{{number_format($product->price, 0, '', '.')}} VNĐ</h3>
            @else
                <del>
                    <h3 style="font-size: 18px; margin-bottom: 5px;">{{number_format($product->price, 0, '', '.')}} VNĐ</h3></del>
                <h3>{{number_format($product->sell_price, 0, '', '.')}} VNĐ</h3>
            @endif
        </div>
    </div>
@endforeach
<div class="page2 page1">{!! $products->links() !!}</div>


