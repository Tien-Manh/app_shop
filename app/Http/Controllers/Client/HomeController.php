<?php

namespace App\Http\Controllers\Client;

use App\MemberAddress;
use App\ProductImage;
use App\Users;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Products;
use Validator;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Contact;
use App\PasswordReset;
use DB;
use App\Customer;
use App\Order;
use App\OrderDetails;
use Illuminate\Support\Facades\Auth;
use App\Likeview;
use App\Comments;
use App\Barner;
use File;
use App\CommentReply;

class HomeController extends Controller
{
    function AdminCp(){
        $cates = Categories::all();
        $users = Users::where('role', 0)->get();
        $products = Products::all();
        $order = Order::all();

    	return view('admin.admin-cp', ['cates' => $cates, 'users' => $users, 'products' => $products, 'order' => $order]);
    }
    function SaveActive(Request $rq){
        $product = Products::find($rq['getId']);
        $product->update(['product_active' => $rq['value']]);
        return response()->json();
    }
    function SaveActiveCate(Request $rq){
        $product = Products::find($rq['getId']);
        $product->update(['product_active' => $rq['value']]);
        return response()->json();
    }
   function SaveActiveProduct(Request $rq){
        $product = Products::find($rq['getId']);
        $product->update(['product_active' => $rq['value']]);
    }

    function showOreder(){
        $carts = DB::table('customer')
            ->join('orders', 'customer.id', '=', 'orders.customer_id')->get();
        return view('admin.admin-orders', ['carts' => $carts]);
    }
    function showOrederDetail($id){
        $cart = Order::find($id);
        $customer = Customer::find($cart->customer_id);
        $order_details = DB::table('order_detailts')
            ->join('products', 'products.id', '=', 'order_detailts.product_id')
            ->where('oreder_id', $id)->get();
        return view('admin.ajax.admin-order-detail', ['cart' => $cart, 'customer' => $customer, 'order_details' => $order_details]);
    }
    function SaveActionOrder(Request $rq){
        if ($rq->ajax()){
            $order = Order::find($rq['id']);
            $order->update(['order_active' => 1]);
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function ResetPass(Request $rq){
        $rule = [
            'email' => 'required|email'
        ];
        $message = [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email sai định dạng'
        ];
        $subemai = Validator::make($rq->all(), $rule, $message);
        if ($subemai->passes()) {
            $email = $rq->email;
            $user = Users::where('email', $email)->first();
                if (!$user) {
                return response()->json([
                    'succss' => true,
                    'success' => 'success mời bạn truy cập email'
                ]);
              }
            $pwdReset = PasswordReset::where('email', $rq->email)->delete();
            $token = sha1(str_random(40) . uniqid());
            $now = Carbon::now();
            $pwdReset = new PasswordReset();
            $pwdReset->email = $rq->email;
            $pwdReset->token = $token;
            $pwdReset->created_at = $now;
            $pwdReset->save();
            $url = url('/reset-pwd/'.$token);
            Mail::send('email.sendmail', compact('url', 'user'), function($message) use ($user){
                $message->to($user->email, $user->name);
                $message->subject('Yêu cầu cấp lại mật khẩu');
            });
            return response()->json(
                [
                    'succss' => true,
                    'success' => 'success mời bạn truy cập email'
                ]
            );
        }
        return response()->json([
            'error' => true,
            'message' => $subemai->errors()
        ], 200);
    }

    public function Pwd($token){
        $pwdReset = PasswordReset::where('token', $token)->first();
        if (!$pwdReset) {
            return "erorr! Lỗi token";
        }
        $day = Carbon::createFromFormat('Y-m-d H:i:s', $pwdReset->created_at);
        $now = Carbon::now();
        $dif = $now->diffInHours($day);
        if($dif > 24){
            DB::table('password_resets')->where('token', $token)->delete();
            return "erorr! Link hết hạn";
        }
        return view('email.reset-pwd', compact('token'));
    }

    public function ResetPWD(Request $rq){
        $pwdReset =PasswordReset::where('token', $rq->token)->first();
        if (!$pwdReset) {
            return "erorr! Lỗi token";
        }
        $day = Carbon::createFromFormat('Y-m-d H:i:s', $pwdReset->created_at);
        $now = Carbon::now();
        $dif = $now->diffInHours($day);
        if($dif > 24){
            DB::table('password_resets')->where('token', $token)->delete();
            return "erorr! Link hết hạn";
        }
        $rule = [
            'password' => 'required|min:6|max:40',
            'password_confirmation' => 'required|same:password'
        ];
        $message = [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải từ 6 ký tự',
            'password.max' => 'Mật khẩu phải ít hơn 40 ký tự',
            'password_confirmation.required' => 'Bạn chưa nhập lại mật khẩu',
            'password_confirmation.same' => 'Mật khẩu phải trùng nhau'
        ];
        $subemai = Validator::make($rq->all(), $rule, $message);
        if ($subemai->passes()) {
                    $user = Users::where('email', $pwdReset->email)->first();
                    $user->password = Hash::make($rq->password);
                    $user->save();
                return response()->json([
                    'succss' => true,
                    'success' => 'Đổi mật khẩu thành công !'
                ]);
        }
        return response()->json([
            'error' => true,
            'message' => $subemai->errors()
        ], 200);

    }

    function  ViewShow(){
        $categories = Categories::where('cate_active', 0)->where('parent_id', '>', 0)->offset(0)->limit(3)->get();
        $products_nam = DB::table('product_details')
            ->join('products', 'products.id',
            '=', 'product_details.product_id')
            ->where('category_name', 2)
            ->where('product_active', 0)
            ->OrderBy('product_id', 'desc')
            ->limit(4)->get();
        $products_nu = DB::table('product_details')
            ->join('products', 'products.id',
            '=', 'product_details.product_id')
            ->where('category_name', 1)
            ->where('product_active', 0)
            ->OrderBy('product_id', 'desc')
            ->limit(4)->get();
        return view('view.index', ['categories' => $categories, 'products_nam' => $products_nam, 'products_nu' => $products_nu]);
    }

    function viewsDetail($id){
        $productId = Products::where('product_slug', $id)->firstOrFail();
        $cateId = Categories::find($productId->cate_id);
        $comments = DB::table('users')
            ->join('comments', 'comments.user_id', '=', 'users.id')
            ->where('product_id', $productId->id)
        ->select('comments.id', 'name', 'avatar',
           'comments.created_at', 'user_id', 'text_comment',
           'product_id', 'active')->get();
        $comment_repplys = DB::table('users')
            ->join('comments_reply', 'comments_reply.user_id', '=', 'users.id')
            ->where('product_id', $productId->id)
            ->select('comments_reply.id', 'name', 'avatar',
                'comments_reply.created_at', 'user_id', 'reply_content',
                'product_id', 'active', 'comments_reply.comment_id')->get();
        $products = DB::table('product_details')->join('products', 'products.id',
            '=', 'product_details.product_id')->where('product_id', $productId->id)->get();
        foreach ($products as $value){
            $product = $value;
        }
        $product_image = ProductImage::where('product_id', $productId->id)->get();
        $likes = Likeview::where('prodct_id', $productId->id)->get();
        $like = '';
        $countLike = count($likes);
        foreach ($likes as $value){
            $like = $value;
        }
        return view('view.detail-product', ['cateId' => $cateId, 'comment_repplys' => $comment_repplys, 'comments' => $comments, 'product' => $product, 'product_image' => $product_image, 'like' => $like, 'countLike' => $countLike]);
    }




    function addCart(Request $rq){
        $product = DB::table('product_details')->join('products', 'products.id',
            '=', 'product_details.product_id')->where('product_id', $rq['id'])->first();
       if ($rq->ajax()){
           if ( $product->sell_price == 0 || $product->sell_price == '') {
               $item = [
                   'id' => $product->id,
                   'name' => $product->product_name,
                   'price' => $product->price,
                   'image' => $product->product_image,
                   'quantity' => 1
               ];
           }
           else {
               $item = [
                   'id' => $product->id,
                   'name' => $product->product_name,
                   'price' => $product->sell_price,
                   'image' => $product->product_image,
                   'quantity' => 1
               ];
           }
           $this->addItemCart($item);
           return response()->json([
               'success' => true
           ]);
       }

    }

    function addCountpoin(Request $rq){
        $carts = Session::get('cartshop');
        $total = 0;
        for ($i=0; $i < count($carts); $i++){
            $total += $carts[$i]['price'] * $carts[$i]['quantity'];
        }
        $getSe = Session::get('countpoin');
        $countPoin = DB::table('countpoin')->where('code', $rq->counpoin)->first();
           if(!empty($countPoin)) {
               if ($rq->counpoin == $getSe) {
                   return redirect()->back()->with(['smg' => 'Code đã được dùng']);
               } elseif ($total < $countPoin->total) {
                   return redirect()->back()->with(['smg' => 'Code này không áp dụng cho đơn hàng của bạn ']);
               } else {
                   Session::put('countpoin', $rq->counpoin);
                   Session::save();
                   return redirect()->back()->with(['succ' => 'Nhập mã thành công']);
               }
           }
          if($rq->counpoin == '') {
               return redirect()->back()->with(['smg' => 'Code chưa được nhập']);
           }
           else {
               return redirect()->back()->with(['smg' => 'Code sai mời bạn nhập lại']);
           }
    }
    function addItemCart($product = [])
    {
    $getSe = Session::get('cartshop');
    if ($getSe === null) {
            session()->push('cartshop', $product);
            Session::save();
        }
        else{
            $flag = false;
            for ($i = 0; $i < count($getSe); $i++ ){
                if ($getSe[$i]['id'] == $product['id']){
                    $getSe[$i]['quantity']++;
                    session()->put('cartshop', $getSe);
                    Session::save();
                    $flag = true;
                    break;
                }
            }
            if ($flag == false){
                session()->push('cartshop', $product);
                Session::save();
            }
        }
    }
    public static function totalCart(){
        $countItem = 0;
        $countArr = Session::get('cartshop');
       if (!empty($countArr) || $countArr != null){
           foreach ($countArr as $item) {
               $countItem += $item['quantity'];
           }
       }
        return $countItem;
    }

    function delAllcart(){
        session()->pull('cartshop', 'default');
        Session::save();
       return redirect()->back();
    }
    function delOnecart($id){
        $getId = session()->get('cartshop');
        for ($i=0; $i < count($getId); $i++){
            if ($getId[$i]['id'] == $id){
                unset($getId[$i]);
                $newGetid = array_values($getId);
                session()->put('cartshop', $newGetid);
                Session::save();
            }
        }
        return redirect()->back();
    }
    function showCart(Request $rq){
        $id = $rq['id'];
        $value = $rq['value'];
        $carts = Session::get('cartshop');
        $getSe = Session::get('countpoin');
        if (!empty($id)){
            foreach ($carts as $key => $val){
                if($id == $val['id']){
                    $val['quantity'] = $value;
                    $valarray = $val;
                    unset($carts[$key]);
                    $carts[$key] = $valarray;
                    ksort($carts);
                    session()->put('cartshop', $carts);
                    Session::save();
                }
         }
         return response()->json([
            'success' => true
         ]);
        }
        $countPoin =  DB::table('countpoin')->where('code', $getSe)->first();
        $total = 0;
        return view('cart.cart-view', ['countPoin' => $countPoin, 'carts' => $carts, 'total' => $total]);
    }
    function checkOunt(Request $rq){
        if (Auth::user()){
           $user = Users::find(Auth::user()->id);
        }
        else{
            $user = new Users();
        }
        $address = DB::table('users_address')->where('user_id', $user->id)->first();
        if ($address == null){
            $address = new MemberAddress();
        }
        $getSe = Session::get('countpoin');
        $countPoin =  DB::table('countpoin')->where('code', $getSe)->first();
        $showDiv = $rq->brand;
        $carts = Session::get('cartshop');
        $total = 0;

        return view('cart.checkout-cart', ['countPoin' => $countPoin, 'address' => $address, 'user' => $user, 'showDiv' => $showDiv, 'carts' => $carts, 'total' => $total]);
    }
    function saveCart(Request $rq){
       $carts = Session::get('cartshop');
       $getSe = Session::get('countpoin');
       $total = 0;
       $valueBrand = 0;
       $brand = '';
        if (Auth::user()){
            $user = Auth::user()->id;
        }
        else{
            $user = null;
        }
        if(!empty($carts)){
            if ($rq->brand == 0){
                $brand .= "Giao hàng miễn phí thời gian khoảng 1 tuần";
                }
                elseif ($rq->brand == 1){
                    $brand .= "Giao hàng trong ngày";
                    $valueBrand = 50000;
                }
                elseif ($rq->brand == 2){
                    $brand .= "Giao hàng địa phương";
                    $valueBrand = 30000;
                }

            for ($i=0; $i < count($carts); $i++){
                if (!empty($getSe)){
                    $countPoin =  DB::table('countpoin')->where('code', $getSe)->first();
                    $total += $carts[$i]['quantity']*$carts[$i]['price'] * (100 - $countPoin->count_price)/100;
                }
                else{
                    $total += $carts[$i]['price'] * $carts[$i]['quantity'];
                }
             }

            $customer = new Customer();
            $customer->first_name = $rq->first_name;
            $customer->last_name = $rq->last_name;
            $customer->gender = $rq->gender;
            $customer->email = $rq->email;
            $customer->province = $rq->province;
            $customer->ward = $rq->ward;
            $customer->commune = $rq->commune;
            $customer->phone = $rq->number_phone;
            $customer->created_at = date('Y-m-d h:i:s');
            $customer->save();
            $order = new Order();
            $order->customer_id = $customer->id;
            $order->user_id = $user;
            $order->date_order = $rq->date_order;
            $order->total = $total + $valueBrand;
            $order->deal = $brand;
            $order->order_active = 0;
            $order->message = $rq->message;
            $order->created_at = date('Y-m-d h:i:s');
            $order->save();
            foreach ($carts as $value){
                $orderDetail = new OrderDetails();
                $orderDetail->oreder_id = $order->id;
                $orderDetail->product_id = $value['id'];
                $orderDetail->quantity = $value['quantity'];
                $orderDetail->unit_price = $value['price'];
                $orderDetail->created_at = date('Y-m-d h:i:s');
                $orderDetail->save();
            }
            session()->pull('cartshop', 'default');
            session()->pull('countpoin', 'default');
            Session::save();
            return redirect()->back()->with('msg', 'Đặt thành công');
        }

       return redirect()->back()->with('msger', 'Bạn chưa có sản phẩm nào trong giỏ hàng');
    }


    function Addlike($id){
        $likes = new Likeview();
        $likes->prodct_id = $id;
        $likes->user_id = Auth::user()->id;
        $likes->created_at = date('Y-m-d h:i:s');
        $likes->save();
        return redirect()->back();
    }

    function Showbaner(){
        $baner =  DB::table('baner_active')->join('baner_details', 'baner_active.baner_id', '=', 'baner_details.id')->get();

        return view('admin.admin-baner', ['baner' => $baner]);
    }
    function banerAdd(){
        $nameShow = 'Thêm Baner';
        $baner = new Barner();
        return view('product.form-baner', ['nameShow' => $nameShow, 'baner' => $baner]);
    }
    function updateBaner($id){
        $nameShow = 'Sửa Baner';
        $baner = Barner::find($id);
        return view('product.form-baner', ['nameShow' => $nameShow, 'baner' => $baner]);
    }

    function saveBaner(Request $rq){
        $filename = '';
        $rule =  [
            'baner_title' => 'required',
//            'barner_text' =>  '',
//            'barner_content_one' => '',
//            'barner_content_two' => '',
            'baner_image' => 'required|image:jpg,jpeg,png|max:2024'
        ];
        $message = [
            'baner_title.required' => 'Title không được để trống',
            'baner_image.required' => 'Ảnh chưa được chọn',
            'baner_image.image' => 'Ảnh phải có định dạng .JPG, .JPEG, .PNG',
            'baner_image.max' => 'Ảnh vượt quá kích cỡ cho phép'
        ];
        $baner = Validator::make($rq->all(), $rule, $message);
        if ($baner->passes()){
            if ($rq->hasFile('baner_image')) {
                $file = $rq->baner_image;
                $filename = time().$file->getClientOriginalName();
                $file->move('assets/image/baner_image', $filename);
            }
           $id =  DB::table('baner_details')->insertGetId([
                'baner_image' => $filename,
                'baner_title' => $rq->baner_title,
                'baner_content' => $rq->baner_content,
                'baner_content_one' => $rq->baner_content_one,
                'baner_content_two' => $rq->baner_content_two,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            DB::table('baner_active')->insert([
                'baner_id' => $id,
                'active' => false,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            return response()->json();
        }
        return response()->json([
           'error' => true, 'message' => $baner->errors()
        ], 200);
    }

    function saveBanerUpdate(Request $rq){
        $rule =  [
            'baner_title' => 'required',
//            'barner_text' =>  '',
//            'barner_content_one' => '',
//            'barner_content_two' => '',
            'baner_image' => 'image:jpg,jpeg,png|max:2024'
        ];
        $message = [
            'baner_title.required' => 'Title dẫn không được để trống',
            'baner_image.image' => 'Ảnh phải có định dạng .JPG, .JPEG, .PNG',
            'baner_image.max' => 'Ảnh vượt quá kích cỡ cho phép'
        ];
        $baner = Validator::make($rq->all(), $rule, $message);
        if ($baner->passes()){
            $baner = Barner::find($rq->id);
            $filename = $baner->baner_image;
            if ($rq->hasFile('baner_image')) {
                $file = $rq->baner_image;
                $file_x = $baner->baner_image;
                $filename = time().$file->getClientOriginalName();
                File::delete('assets/image/baner_image/'. $file_x);
                $file->move('assets/image/baner_image', $filename);
            }
            if ($rq->hasFile('baner_image') == '') {
                $filename = $baner->baner_image;
            }
            DB::table('baner_details')->where('id', $rq->id)->update([
                'baner_image' => $filename,
                'baner_title' => $rq->baner_title,
                'baner_content' => $rq->baner_content,
                'baner_content_one' => $rq->baner_content_one,
                'baner_content_two' => $rq->baner_content_two,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
            return response()->json();
        }
        return response()->json([
            'error' => true, 'message' => $baner->errors()
        ], 200);
    }

    function removeBaner(Request $rq){
        if ($rq->ajax()){
            $baner = Barner::find($rq['getId']);
            $filename = $baner->baner_image;
            if ($filename != null || $filename != ''){
                File::delete('assets/image/baner_image/' . $filename);
            }
            $baner->delete();
            $baner_active = DB::table('baner_active')->where('baner_id', $rq['getId']);
            $baner_active->delete();
            return response()->json();
        }
    }

    function banerSaveactive(Request $rq){
        if($rq->ajax()){
            DB::table('baner_active')->select('active')->update(['active' => 0]);
            DB::table('baner_active')->where('baner_id', $rq['getId'])->update(['active' => 1]);
            return response()->json([
                'success' => true
            ]);
        }
    }

    function postComment(Request $rq){
        if (!empty(Auth::user())) {
            $comment = new Comments();
            $user = Auth::user()->id;
            $product_id = $rq->product_id;

            $comment->user_id = $user;
            $comment->product_id = $product_id;
            $comment->text_comment = $rq->comment;
            $comment->created_at = date('Y-m-d h:i:s');

            $comment->save();
            return redirect()->back();
        }
    }

    function postReply(Request $rq){
        if(!empty(Auth::user())){
            $comment_reply = new CommentReply();
            $user = Auth::user()->id;
            $product_id = $rq->product_id;
            $comment_id = $rq->comment_id;

            $comment_reply->comment_id = $comment_id;
            $comment_reply->user_id = $user;
            $comment_reply->product_id = $product_id;
            $comment_reply->reply_content = $rq->reply_content;
            $comment_reply->created_at = date('Y-m-d h:i:s');

            $comment_reply->save();
            return redirect()->back();
        }
    }

    function deletecm($id){
        $commen = Comments::find($id);
        $commenrp = CommentReply::where('comment_id', $id)->get();
        if (count($commenrp) > 0){
            foreach ($commenrp as $val){
                $val->delete();
            }
        }
        $commen->delete();
        return redirect()->back();
    }
    function deletecmrp($id){
       $commenrp = CommentReply::find($id);
       $commenrp->delete();
       return redirect()->back();
    }
    function codecountpoinShow(){
        $counpoint = DB::table('countpoin')->get();
        return view('admin.admin-counpoint', ['counpoint' => $counpoint]);
    }
    function codecountAdd(){
        return view('cate.form-code');
    }
    function codecountpoinSave(Request $rq){
        $rule =  [
            'code_key' => 'required|unique:countpoin,code',
            'code_price' => 'required|min:1|max:100',
            'code_total' => 'nullable|numeric|max:9999999',
            'time' => 'date_format:Y-m-d|after:today'
        ];
        $message = [
            'code_key.required' => 'Code không được để trống',
            'code_key.unique' => 'Code đã có',
            'code_price.required' => 'Chưa nhập % giảm giá',
            'code_price.min' => 'Không nhỏ hơn 1%',
            'code_price.max' => 'Không quá 100%',
            'code_total.max' => 'Không quá 9.999.999 VNĐ',
            'time.date_format' => 'Chưa nhập thời gian dùng mã code',
            'time.after' => 'Thời gian phải là ngày sau ngày hôm nay'
        ];
        $code = Validator::make($rq->all(), $rule, $message);
        if ($code->passes()){
            DB::table('countpoin')->insert([
                'code' => $rq->code_key,
                'count_price' => $rq->code_price,
                'total' => $rq->code_total,
                'time' => $rq->time,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            return response()->json();
        }
        return response()->json([
            'error' => true,
            'message' => $code->errors()
        ], 200);
    }

    function __construct(){
        $getDate = date('Y-m-d');
        $countPoin =  DB::table('countpoin')->get();
            foreach ($countPoin as $val){
                if ($getDate > $val->time){
                    DB::table('countpoin')->where('id', $val->id)->delete();
                }
            }
        }

}
