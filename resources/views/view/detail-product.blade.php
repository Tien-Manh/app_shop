@extends('layout.layout-fontend.index')
@section('title', 'Chi tiết sản phẩm')
@section('baner')
    @include('layout.layout-fontend.baner-sub', ['name_page' => 'Trang Chi Tiết Sản Phẩm', 'name_show' => 'Chi tiết sản phẩm'])
@endsection
@section('contents')

            <div class="container">
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-5" style="overflow:hidden; width: 100%; height: 700px;">
                            <div class="quick-view-carousel-details" style="overflow: hidden;height: 700px;">
                                <div class="item" style="background: url({{asset('assets/image/product_image/' .$product->product_image)}})">
                                </div>
                                    @if(count($product_image) > 0)
                                        @foreach($product_image as $value)
                                                <div class="item" style="background: url({{asset('assets/image/product_image_thumb/' .$value->image)}})">
                                                </div>
                                        @endforeach
                                    @else
                                        <div class="item" style="background: url({{asset('assets/image/product_image/' .$product->product_image)}})">
                                        </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">{{$product->product_name}}</h3>
                                        @if($product->sell_price == '' || empty($product->sell_price) || empty($product->sell_price) || $product->sell_price == 0)
                                        <div class="price d-flex align-items-center">
                                            <span class="lnr lnr-tag"></span>
                                            <span class="ml-10">{{number_format($product->price)}} VNĐ</span>
                                        </div>
                                        @else
                                        <div class="price d-flex align-items-center">
                                            <del>
                                                <span class="ml-10">{{number_format($product->price)}} VNĐ</span>
                                            </del>
                                        </div>
                                        <div class="price d-flex align-items-center">
                                            <span class="lnr lnr-tag"></span>
                                            <span class="ml-10">{{number_format($product->sell_price)}} VNĐ</span>
                                        </div>
                                        @endif
                                    <div class="category">Danh mục: <span>{{$cateId->cate_name}}</span></div>
                                    <div class="available">Mới: <span>{{$product->new}}%</span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">{{$product->short_description}}</p>
                                </div>
                                <div >
                                    <div class="quantity-container d-flex align-items-center mt-15">

                                    </div>
                                    <div class="d-flex mt-20">
                                        <a style="position: absolute; color: white; left: 64px; background-color: transparent !important;"  href="javascript:" class="view-btn hie">Add to Cart</a>
                                        <a style="position: relative;" id="{{$product->id}}" href="javascript:" class="view-btn color-2 cartCk"><span>Add to Cart</span></a>
                                        @if (!empty($like) && !empty(Auth::user()))
                                            @if(Auth::user()->id === $like->user_id)
                                                <a style="cursor: pointer" class="like-btn"><span style="color: crimson; text-shadow:0 0 3px gray, 0 0 5px gray;" class="fa fa-heart"></span>&nbsp {{$countLike}}</a>
                                            @endif
                                        @elseif(empty(Auth::user()))
                                            <a style="cursor: pointer;" class="like-btn"><span class="lnr lnr-heart"></span> &nbsp @if($countLike == 0){{''}} @else {{$countLike}} @endif</a>
                                       @else
                                            <a href="{{route('add.like', ['id' => $product->id])}}" class="like-btn"><span class="lnr lnr-heart">&nbsp @if($countLike == 0){{''}} @else {{$countLike}} @endif</span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="details-tab-navigation d-flex justify-content-center mt-30">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li>
                            <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-expanded="true">Mô tả</a>
                        </li>
                        <li>
                            <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification">Thông số</a>
                        </li>
                        <li>
                            <a class="nav-link active" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments">Bình luận</a>
                        </li>
                        <!-- <li>
                            <a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a>
                        </li> -->
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description">
                        <div class="description">
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification">
                        <div class="specification-table">
                            <div class="single-row">
                                <span>Nhãn hiệu</span>
                                <span>{{$product->brand}}</span>
                            </div>
                            <div class="single-row">
                                <span>Xuất xứ</span>
                                <span>{{$product->madein}}</span>
                            </div>
                            <div class="single-row">
                                <span>Loại</span>
                                <span>{{$product->type}}</span>
                            </div>
                            <div class="single-row">
                                <span>Màu sắc</span>
                                <span>{{$product->color}}</span>
                            </div>
                            <div class="single-row">
                                <span>Trọng lượng</span>
                                <span>{{$product->weight}} Gam</span>
                            </div>
                            <div class="single-row">
                                <span>Kiểm tra chất lượng</span>
                                @if($product->qualitycheck == 0)
                                    <span>Có</span>
                                 @else
                                    <span>Không</span>
                                @endif

                            </div>
                            <div class="single-row">
                                <span>Độ mới</span>
                                <span>{{$product->new}}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="comments">
                        <div class="review-wrapper">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="total-comment scrollbar" style="min-height: 120px;max-height: 540px !important; height: auto; word-wrap: break-word;">
                                      @if(count($comments) == 0)
                                            <p class="user-comment">Chưa có bình luận nào !</p>
                                          @else
                                        @foreach($comments as $comment)
                                            <div class="fixcm">
                                                <div class="single-comment checkhide">
                                                    <div class="user-details d-flex align-items-center flex-wrap">
                                                        @if($comment->avatar == null || $comment->avatar == '')
                                                            <img src="{{asset('assets/image/null_avatar/fb.jpg')}}" class="img-fluid order-1 order-sm-1" alt="">
                                                       @else
                                                            <img src="{{asset('assets/image/avatar/' . $comment->avatar)}}" class="img-fluid order-1 order-sm-1" alt="">
                                                        @endif
                                                        <div class="user-name order-3 order-sm-2">
                                                            <h5>{{$comment->name}}</h5>
                                                            <span>{{$comment->created_at}}</span>
                                                        </div>
                                                        @if (!Auth::user())
                                                            <div></div>
                                                        @else
                                                            @if(Auth::user() && Auth::user()->role == 2)
                                                            <a href="{{route('delete.cm', ['id' => $comment->id])}}" style="min-width: 20px;left: 50px;border-radius: 20px;overflow: hidden" class="view-btn color-2 ku order-2 order-sm-3"><span>Xóa</span></a>
                                                            @endif
                                                            <button class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Trả lời</span></button>
                                                        @endif
                                                    </div>

                                                    <p class="user-comment">
                                                        {{$comment->text_comment}}
                                                    </p>
                                                    <form action="{{route('post.reply')}}" method="post" class="form-comment row mb-5">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$product->id}}" name="product_id"></input>
                                                        <input type="hidden" value="{{$comment->id}}" name="comment_id"></input>
                                                        <textarea placeholder="Bình luận" name="reply_content" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                        <button class="view-btn color-2"><span>Đăng</span></button>
                                                    </form>
                                                </div>
                                                {{--<div style="padding-bottom: 15px;" class="xem">Xem bình luận . . .</div>--}}
                                                @foreach($comment_repplys as $comment_repply)
                                                    @if($comment_repply->comment_id == $comment->id)
                                                        <div class="single-comment reply-comment">
                                                            <div class="user-details d-flex align-items-center flex-wrap">
                                                                @if($comment_repply->avatar == null || $comment_repply->avatar == '')
                                                                    <img src="{{asset('assets/image/null_avatar/fb.jpg')}}" class="img-fluid order-1 order-sm-1" alt="">
                                                                @else
                                                                    <img src="{{asset('assets/image/avatar/'. $comment_repply->avatar)}}" class="img-fluid order-1 order-sm-1" alt="">
                                                                @endif
                                                                <div class="user-name order-3 order-sm-2">
                                                                    <h5>{{$comment_repply->name}}</h5>
                                                                    <span>{{$comment_repply->created_at}}</span>
                                                                </div>
                                                                    @if(Auth::user() && Auth::user()->role == 2)
                                                                    <a href="{{route('delete.cmrp', ['id' => $comment_repply->id])}}" style="min-width: 20px;left: 50px;border-radius: 20px;overflow: hidden" class="view-btn color-2 order-2 order-sm-3 ku"><span>Xóa</span></a>
                                                                    @endif
                                                            </div>
                                                            <p class="user-comment">
                                                                {{$comment_repply->reply_content}}
                                                            </p>
                                                            <form action="" class="form-comment row mb-5">
                                                                {{csrf_field()}}
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <textarea placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea mb-2"></textarea>
                                                                <button class="view-btn color-2"><span>Đăng</span></button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <?php
                                                if(count(\App\CommentReply::where('comment_id', $comment->id)->get()) >= 3)
                                                {
                                                    echo '<div style="padding-bottom: 15px;" class="xem">Xem thêm bình luận . . .</div>';
                                                }
                                                ?>
                                            </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <button class="view-btn color-2 w-100 mt-3"><span>Tải thêm</span></button>
                                </div>
                                <div class="col-xl-5">
                                    <div class="add-review">
                                        @if (!Auth::user())
                                            <div></div>
                                        @else
                                            <h3>Đăng bình luận</h3>
                                            <form action="{{route('post.comment')}}" method="post" class="main-form">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$product->id}}" name="product_id"></input>
                                                <textarea name="comment" placeholder="Bình luận" onfocus="this.placeholder=''" onblur="this.placeholder = 'Bình luận'" required class="common-textarea"></textarea>
                                                <button class="view-btn color-2"><span>Đăng</span></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('myjs')
    <script src="{{asset('js/products-ajax.js')}}"></script>
    <script src="{{asset('fontend/js/g.js')}}"></script>
    <script src="{{asset('js/addcar.js')}}"></script>
    <script>
        $('.ku').click(function (e) {
            if(confirm('Xác nhận xóa bình luận này !')) {
            }
            else {
                e.preventDefault();
                return false;
            }
        })

    </script>
@endsection
