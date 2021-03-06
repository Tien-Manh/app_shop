<?php

namespace App\Http\Controllers\Client;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Products;
use App\ProductDetails;
use App\ProductImage;
use PhpParser\Node\Expr\Cast\Array_;
use Validator;
use DB;
use File;
use Illuminate\Support\Collection;
use Intervention\Image\ImageManagerStatic as Image;
class ProductController extends Controller
{
    public static function forCount($category, $cate, $productOjb = [], $products = []){
        foreach ($category as $key => $val) {
            if ($val->parent_id == $cate) {
                $id = $val->id;
                $product[$key] = DB::table('product_details')
                    ->join('products', 'products.id',
                        '=', 'product_details.product_id')
                    ->where('product_active', 0)
                    ->where('cate_id', $id)
                    ->get();
                $productt = DB::table('product_details')
                    ->join('products', 'products.id',
                        '=', 'product_details.product_id')
                    ->where('product_active', 0)
                    ->where('cate_id',  $id)
                    ->get();
                self::forCount($category, $id, $productOjb, $products);
                if (!empty($product) || !empty($productt)){
                    foreach($product as $items) {
                        foreach($items as $item)
                        {
                            $productOjb->push($item);
                        }

                    }
                    foreach ($products as $val){
                        $productOjb->push($val);
                    }

                }
                $productOjb = $productOjb->unique();

            }
            else{
                $products = DB::table('product_details')
                    ->join('products', 'products.id',
                        '=', 'product_details.product_id')
                    ->where('product_active', 0)
                    ->where('cate_id',  $cate)
                    ->get();
            }
        }

        return [$products, $productOjb];
    }
    public static function counCate($id)
    {
        $category = Categories::where('cate_active', 0)->get();
        $cate = Categories::where('cate_slug', $id)->first();
        $productOjb = new Collection();
        $products = [];
        list($products, $productOjb) = self::forCount($category, $cate->id, $productOjb, $products);
        if (!empty($productOjb) && count($productOjb) > 0){
            $products = $productOjb;
        }
        return count($products);
    }

    function ShowProduct(){
        $products = DB::table('product_details')->join('products', 'products.id',
            '=', 'product_details.product_id')->get();
    	return view('admin.admin-products', ['products' => $products]);
    }

    function removeProduct(Request $rq){
        $product = Products::find($rq['getId']);
        $product_detail = ProductDetails::where('product_id', $rq['getId']);
        $product_image = ProductImage::where('product_id', $rq['getId'])->get();
        foreach ($product_image as $value){
            $filename = $value->image;
            if ($filename != null || $filename != ''){
                File::delete('assets/image/product_image_thumb/' . $filename);
                $value->delete();
            }
        }
        $filenamepr = $product->product_image;
        if ($filenamepr != null || $filenamepr != ''){
            File::delete('assets/image/product_image/' . $filenamepr);
            File::delete('assets/image/image_crop/' . $filenamepr);
        }
        $product_detail->delete();
        $product->delete();
        return response()->json();
    }

    function addProduct(){
        $nameShow = 'Th??m S???n Ph???m';
        $product = new Products();
        $parent_cate = Categories::select('id', 'cate_name', 'parent_id')->get();
        return view('product.form', ['parent_cate' => $parent_cate, 'product' => $product, 'nameShow' => $nameShow]);
    }
    function updateProduct($id){
        $nameShow = 'S???a S???n Ph???m';
        $parent_cate = Categories::select('id', 'cate_name', 'parent_id')->get();
        $product_image = ProductImage::where('product_id', $id)->get();
        $products = DB::table('product_details')->join('products', 'products.id',
            '=', 'product_details.product_id')->where('product_id', $id)->get();
        foreach ($products as $value) {
            $product = $value;
        }
        return view('product.form', ['parent_cate' => $parent_cate, 'product' => $product, 'product_image' => $product_image, 'nameShow' => $nameShow]);
    }

    function saveProduct(Request $rq){
        $filename = [];
        $valueprice = $rq->price - 1000;
        $rule = [
            'product_name' => 'required|min:4|max:40|unique:products,product_name',
            'product_slug' => 'required|min:4|max:80|unique:products,product_slug',
            'description' => 'required|min:10|max:1000',
            'short_description' => 'required|min:10|max:400',
            'cate_id' => 'required|not_in:0',
            'price' => 'required|numeric|min:1000|max:9999999',
            'sell_price' => 'nullable|numeric|min:1000|lte:'.$valueprice.'|max:9999999',
            'product_image' => 'required|image:jpg,jpeg,png|max:2024|dimensions:min_width >= 450,min_height=600',
            'amount' => 'nullable|numeric|max:1000',
            'brand' => 'required|not_in:0',
            'madein' => 'nullable|max:30',
            'type' => 'nullable|max:30',
            'weight' => 'nullable|numeric|max:3000',
            'new' => 'nullable|numeric|max:100',
            'color' => 'required|not_in:0'
        ];
        $message = [
            'product_name.required' => 'T??n kh??ng ???????c ????? tr???ng',
            'product_name.min' => 'T??n ph???i t??? 4 k?? t???',
            'product_name.max' => 'T??n kh??ng qu?? 40 k?? t???',
            'product_name.unique' => 'T??n n??y ???? ???????c d??ng',
            'product_slug.required' => '???????ng d???n kh??ng ???????c ????? tr???ng',
            'product_slug.min' => '???????ng d???n ph???i t??? 4 k?? t???',
            'product_slug.max' => '???????ng d???n kh??ng qu?? 80 k?? t???',
            'product_slug.unique' => '???????ng d???n n??y ???? ???????c d??ng',
            'description.required' => 'Tr??ch d???n kh??ng ???????c ????? tr???ng',
            'description.min' => 'Tr??ch d???n ph???i t??? 10 k?? t???',
            'description.max' => 'Tr??ch d???n kh??ng qu?? 1000 k?? t???',
            'short_description.required' => 'T??m t???t tr??ch d???n kh??ng ???????c ????? tr???ng',
            'short_description.min' => 'T??m t???t tr??ch d???n ph???i t??? 10 k?? t???',
            'short_description.max' => 'T??m t???t tr??ch d???n kh??ng qu?? 400 k?? t???',
            'cate_id.required' => 'Ch??a ch???n danh m???c',
            'brand.required' => 'Ch??a ch???n th????ng hi???u',
            'color.required' => 'Ch??a ch???n m??u',
            'price.required' => 'Gi?? kh??ng ???????c ????? tr???ng',
            'price.min' => 'Gi?? ph???i l???n h??n ho???c b???ng 1.000',
            'price.max' => 'Gi?? kh??ng qu?? 9.999.999',
            'sell_price.min' => 'Gi?? khuy???n m??i ph???i l???n h??n ho???c b???ng 1.000',
            'sell_price.max' => 'Gi?? khuy???n m??i kh??ng qu?? 9.999.999',
            'amount.max' => 'S??? l?????ng kh??ng qu?? 1000',
            'madein.max' => 'Kh??ng qu?? 30 k?? t???',
            'type.max' => 'Kh??ng qu?? 30 k?? t???',
            'weight.max' => 'Kh??ng qu?? 3.000 g',
            'new.max' => 'Kh??ng qu?? 100%',
            'sell_price.lte' => 'Gi?? khuy???n m??i ph???i nh??? h??n gi?? b??n',
            'product_image.image' => '???nh ph???i c?? ?????nh dang JPG, JPEG, PNG',
            'product_image.max' => '???nh l???n h??n 2024',
            'product_image.required' => '???nh ch??a ???????c ch???n',
            'product_image.dimensions' => 'K??ch th?????c ???nh kh??ng h???p l??? min 450*600(px)'
        ];

        $add = Validator::make($rq->all(), $rule, $message);
        if ($add->passes()) {
            if ($rq->hasFile('product_image')) {
                $file = $rq->product_image;
                $filename = time().$file->getClientOriginalName();
                $path = public_path('assets/image/image_crop/' . $filename);
                Image::make($file->getRealPath())->crop(500, 750)->save($path);

                $file->move('assets/image/product_image', $filename);
            }
            $product_id = DB::table('products')->insertGetId([
                'product_name' => $rq->product_name,
                'product_slug' => $rq->product_slug,
                'description' => $rq->description,
                'short_description' => $rq->short_description,
                'cate_id' => $rq->cate_id,
                'product_active' => $rq->active,
                'product_image' => $filename,
                'product_remove' => 0,
                'category_name' => $rq->category_name,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            DB::table('product_details')->insert([
                'product_id' => $product_id,
                'price' => $rq->price,
                'sell_price' => $rq->sell_price,
                'amount' => $rq->amount,
                'brand' => $rq->brand,
                'madein' => $rq->madein,
                'type' => $rq->type,
                'weight' => $rq->weight,
                'qualitycheck' => $rq->qualitycheck,
                'new' => $rq->new,
                'color' => $rq->color,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            if ($rq->hasFile('product_image_thumb')) {
                $image = $rq->product_image_thumb;
                foreach($image as $file){
                    $filename = time().$file->getClientOriginalName();
                    $file->move('assets/image/product_image_thumb', $filename);
                    DB::table('products_image')->insert([
                        'product_id' => $product_id,
                        'image' => $filename,
                        'created_at' => date('Y-m-d h:i:s')
                    ]);
                }
            }

          return response()->json($rq->all());
        }
        return response()->json([
            'error' => true,
            'message' => $add->errors()
        ], 200);
    }


    function saveUpdateProduct(Request $rq){
        $filename = "";
        $valueprice = $rq->price - 1000;

        $rule = [
            'product_name' => 'required|min:4|max:40|unique:products,product_name,'.$rq->id.',id',
            'product_slug' => 'required|min:4|max:80|unique:products,product_slug,'.$rq->id.',id',
            'description' => 'required|min:10|max:1000',
            'short_description' => 'required|min:10|max:400',
            'cate_id' => 'required|not_in:0',
            'price' => 'required|numeric|min:1000|max:9999999',
            'sell_price' => 'nullable|numeric|min:1000|lte:'.$valueprice.'|max:9999999',
            'amount' => 'nullable|numeric|max:1000',
            'madein' => 'nullable|max:30',
            'type' => 'nullable|max:30',
            'weight' => 'nullable|numeric|max:3000',
            'new' => 'nullable|numeric|max:100',
            'brand' => 'required|not_in:0',
            'color' => 'required|not_in:0',
            'product_image' => 'image:jpg,jpeg,png|max:10000'
        ];
        $message = [
            'product_name.required' => 'T??n kh??ng ???????c ????? tr???ng',
            'product_name.min' => 'T??n ph???i t??? 4 k?? t???',
            'product_name.max' => 'T??n kh??ng qu?? 40 k?? t???',
            'product_name.unique' => 'T??n n??y ???? ???????c d??ng',
            'product_slug.required' => '???????ng d???n kh??ng ???????c ????? tr???ng',
            'product_slug.min' => '???????ng d???n ph???i t??? 4 k?? t???',
            'product_slug.max' => '???????ng d???n kh??ng qu?? 80 k?? t???',
            'product_slug.unique' => '???????ng d???n n??y ???? ???????c d??ng',
            'description.required' => 'Tr??ch d???n kh??ng ???????c ????? tr???ng',
            'description.min' => 'Tr??ch d???n ph???i t??? 10 k?? t???',
            'description.max' => 'Tr??ch d???n kh??ng qu?? 1000 k?? t???',
            'short_description.required' => 'T??m t???t tr??ch d???n kh??ng ???????c ????? tr???ng',
            'short_description.min' => 'T??m t???t tr??ch d???n ph???i t??? 10 k?? t???',
            'short_description.max' => 'T??m t???t tr??ch d???n kh??ng qu?? 400 k?? t???',
            'cate_id.required' => 'Ch??a ch???n danh m???c',
            'brand.required' => 'Ch??a ch???n th????ng hi???u',
            'color.required' => 'Ch??a ch???n m??u',
            'price.required' => 'Gi?? kh??ng ???????c ????? tr???ng',
            'price.min' => 'Gi?? ph???i l???n h??n ho???c b???ng 1.000',
            'price.max' => 'Gi?? kh??ng qu?? 9.999.999',
            'sell_price.min' => 'Gi?? khuy???n m??i ph???i l???n h??n ho???c b???ng 1.000',
            'sell_price.max' => 'Gi?? khuy???n m??i kh??ng qu?? 9.999.999',
            'sell_price.lte' => 'Gi?? khuy???n m??i ph???i nh??? h??n gi?? b??n',
            'amount.max' => 'S??? l?????ng kh??ng qu?? 1000',
            'madein.max' => 'Kh??ng qu?? 30 k?? t???',
            'type.max' => 'Kh??ng qu?? 30 k?? t???',
            'weight.max' => 'Kh??ng qu?? 3.000 g',
            'new.max' => 'Kh??ng qu?? 100%',
            'product_image.image' => '???nh ph???i c?? ?????nh dang JPG, JPEG, PNG',
            'product_image.max' => '???nh l???n h??n 1024'
        ];

        $update = Validator::make($rq->all(), $rule, $message);
        if ($update->passes()) {
            $product = Products::find($rq->id);
            if ($rq->hasFile('product_image')) {
                $file = $rq->product_image;
                $file_x = $product->product_image;
                $filename = time().$file->getClientOriginalName();
                File::delete('assets/image/product_image/'. $file_x);
                File::delete('assets/image/image_crop/'. $file_x);
                $path = public_path('assets/image/image_crop/' . $filename);
                Image::make($file->getRealPath())->crop(500, 750)->save($path);
                $file->move('assets/image/product_image', $filename);
            }
            if ($rq->hasFile('product_image') == '') {
                $filename = $product->product_image;
            }
            DB::table('products')->where('id', $rq->id)->update([
                'product_name' => $rq->product_name,
                'product_slug' => $rq->product_slug,
                'description' => $rq->description,
                'short_description' => $rq->short_description,
                'cate_id' => $rq->cate_id,
                'product_active' => $rq->active,
                'product_image' => $filename,
                'product_remove' => 0,
                'category_name' => $rq->category_name,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
            DB::table('product_details')->where('product_id', $rq->id)->update([
                'price' => $rq->price,
                'sell_price' => $rq->sell_price,
                'amount' => $rq->amount,
                'brand' => $rq->brand,
                'madein' => $rq->madein,
                'type' => $rq->type,
                'weight' => $rq->weight,
                'qualitycheck' => $rq->qualitycheck,
                'new' => $rq->new,
                'color' => $rq->color,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
            $product_image = ProductImage::where('product_id', $rq->id)->get();
                foreach ($product_image as $value){
                    if ($rq->hasFile('product_image_thumb') == '') {
                        $filename = $value->product_image_thumb;
                }
            }
            if ($rq->hasFile('product_image_thumb')) {
                foreach ($product_image as $value){
                    $file_x = $value->image;
                    File::delete('assets/image/product_image_thumb/'. $file_x);
                }
                $image = $rq->product_image_thumb;
                foreach($image as $file){
                    $filename = time().$file->getClientOriginalName();
                    $file->move('assets/image/product_image_thumb', $filename);
                    DB::table('products_image')->insert([
                        'product_id' => $rq->id,
                        'image' => $filename,
                        'updated_at' => date('Y-m-d h:i:s')
                    ]);
                }
            }
            return response()->json();
        }
        return response()->json([
            'error' => true,
            'message' => $update->errors()
        ], 200);

    }

    function showProducts(Request $rq){
        $vablier = 'S???n ph???m';
        $title ='S???n ph???m';
        $getShow = $rq['value'];
        $listcount = 9;
        $colum = 'products.id';
        $desc = $rq['desc'];
        $brand = $rq['brand'];
        $color = $rq['color'];
        $firstval = $rq['firstval'];
        $lastval = $rq['lastval'];
        if ($desc == ''){
            $desc = 'asc';
        }
        if ($desc == 1){
            $desc = 'asc';
            $colum = 'price';
        }
        if ($desc == 2){
            $desc = 'desc';
            $colum = 'price';
        }
        if ($desc == 3){
            $desc = 'desc';
        }
        if ($getShow != ''){
            $listcount = $getShow;
        }
        $category = Categories::where('cate_active', 0)->get();
        if ($firstval != '' && $brand == null && $color == null){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->whereBetween('price', [$firstval, $lastval])
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
        }
        else if ($brand != null && $color != null && $firstval != null || $lastval != null){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('brand', $brand)
                ->where('color', $color)
                ->whereBetween('price', [$firstval, $lastval])
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
        }

        elseif ($brand != '' && $color != ''){
        $products = DB::table('product_details')
            ->join('products', 'products.id',
                '=', 'product_details.product_id')
            ->where('brand', $brand)
            ->where('color', $color)
            ->orderBy($colum, $desc)
            ->where('product_active', 0)->paginate($listcount);
        }
        elseif ($color != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('color', $color)
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
        }
        elseif ($brand != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('brand', $brand)
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
        }

        else {
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->orderBy($colum, $desc)
                ->where('product_active', 0)
                ->paginate($listcount);
        }
        $results = '';
        if (count($products) == 0){
            $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
            return $results;
        }
        if ($rq->ajax()){
            return response()->json(view('view.product_ajax')->with('products', $products)->render());
        }
        return view('view.products', ['vablier' => $vablier, 'results' => $results, 'title' => $title, 'products' => $products, 'category' => $category]);
    }
    function searchPr(Request $rq){
        $title = 'T??m ki???m';
        $result = $rq->search_product;
        $listcount = 9;
        $colum = 'products.id';
        $brand = $rq['brand'];
        $color = $rq['color'];
        $firstval = $rq['firstval'];
        $lastval = $rq['lastval'];
        $desc = $rq['desc'];
        $getShow = $rq['value'];
        $vablier = 'S???n ph???m v???i t??? kh??a: ' .$result;
        $results = '';
        if ($getShow != ''){
            $listcount = $getShow;
        }
        if ($desc == ''){
            $desc = 'asc';
        }
        if ($desc == 1){
            $desc = 'asc';
            $colum = 'price';
        }
        if ($desc == 2){
            $desc = 'desc)';
            $colum = 'price';
        }
        if ($desc == 3){
            $desc = 'desc';
        }
        $category = Categories::where('cate_active', 0)->get();
        if ($firstval != '' && $brand == null && $color == null){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->whereBetween('price', [$firstval, $lastval])
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }
        else if ($brand != null && $color != null && $firstval != null || $lastval != null){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('brand', $brand)
                ->where('color', $color)
                ->whereBetween('price', [$firstval, $lastval])
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }

        elseif ($brand != '' && $color != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('brand', $brand)
                ->where('color', $color)
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
            $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
            return $results;
            }
        }
        elseif ($brand != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('brand', $brand)
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }
        elseif ($color != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('color', $color)
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }
        else {
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('product_name', 'LIKE', "%$result%")
                ->orwhere('price', 'LIKE', "%$result%")
                ->orwhere('color', 'LIKE', "%$result%")
                ->orwhere('brand', 'LIKE', "%$result%")
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                return view('error.error-search', ['result' => $result]);
            }
        }

        if ($rq->ajax()){
            return response()->json(view('view.product_ajax')->with('products', $products)->render());
        }
        return view('view.products', ['vablier' => $vablier, 'results' => $results, 'title' => $title, 'products' => $products, 'category' => $category]);
    }
    function saLe(Request $rq){
        $vablier = 'Gi???m gi??';
        $title ='S???n ph???m';
        $getShow = $rq['value'];
        $listcount = 9;
        $colum = 'products.id';
        $desc = $rq['desc'];
        $brand = $rq['brand'];
        $color = $rq['color'];
        $firstval = $rq['firstval'];
        $lastval = $rq['lastval'];
        if ($desc == ''){
            $desc = 'asc';
        }
        if ($desc == 1){
            $desc = 'asc';
            $colum = 'sell_price';
        }
        if ($desc == 2){
            $desc = 'desc';
            $colum = 'sell_price';
        }
        if ($desc == 3){
            $desc = 'desc';
        }
        if ($getShow != ''){
            $listcount = $getShow;
        }
        $results = '';
        $category = Categories::where('cate_active', 0)->get();
        if ($firstval != '' && $brand == null && $color == null){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->whereBetween('sell_price', [$firstval, $lastval])
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }
        else if ($brand != null && $color != null && $firstval != null || $lastval != null){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('brand', $brand)
                ->where('color', $color)
                ->whereBetween('sell_price', [$firstval, $lastval])
                ->orderBy($colum, $desc)
                ->where('product_active', 0)->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }

        elseif ($brand != '' && $color != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('product_active', 0)
                ->where('product_details.sell_price', '<>', '')
                ->where ('product_details.sell_price', '<>', NULL)
                ->where('brand', $brand)
                ->where('color', $color)
                ->orderBy($colum, $desc)
                ->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }
        elseif ($brand != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('product_active', 0)
                ->where('product_details.sell_price', '<>', '')
                ->where ('product_details.sell_price', '<>', NULL)
                ->where('brand', $brand)
                ->orderBy($colum, $desc)
                ->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }
        elseif ($color != ''){
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->where('product_active', 0)
                ->where('product_details.sell_price', '<>', '')
                ->where ('product_details.sell_price', '<>', NULL)
                ->where('color', $color)
                ->orderBy($colum, $desc)
                ->paginate($listcount);
            if (count($products) == 0){
                $results = '<p class="mt-5" style="font-size: 18px;width: 100%; text-align: center">Kh??ng c?? k???t qu??? n??o ph?? h???p !</p>';
                return $results;
            }
        }

        else {
            $products = DB::table('product_details')
                ->join('products', 'products.id',
                    '=', 'product_details.product_id')
                ->orderBy($colum, $desc)
                ->where('product_active', 0)
                ->where('product_details.sell_price', '<>', '')
                ->orwhere ('product_details.sell_price', '<>', NULL)
                ->paginate($listcount);
        }
        if (count($products) == 0){
            echo $results;
        }
        if ($rq->ajax()){
            return response()->json(view('view.product_ajax')->with('products', $products)->render());
        }
        return view('view.products', ['vablier' => $vablier, 'results' => $results, 'title' => $title, 'products' => $products, 'category' => $category]);
    }
    function  AjaxshowProducts(Request $rq){
       $query = $rq->getData;
       if ($rq->ajax()){
           if ($query != ''){
               $data = DB::table('product_details')
                   ->join('products', 'products.id',
                       '=', 'product_details.product_id')
                   ->where('product_name', 'LIKE', "%$query%")
                   ->orwhere('price', 'LIKE', "%$query%")
                   ->orwhere('color', 'LIKE', "%$query%")
                   ->orwhere('brand', 'LIKE', "%$query%")
                   ->where('product_active', 0)
                   ->offset(0)->limit(8)->get();
               $counTdata = DB::table('product_details')
                   ->join('products', 'products.id',
                       '=', 'product_details.product_id')
                   ->where('product_name', 'LIKE', "%$query%")
                   ->orwhere('price', 'LIKE', "%$query%")
                   ->orwhere('color', 'LIKE', "%$query%")
                   ->orwhere('brand', 'LIKE', "%$query%")
                   ->where('product_active', 0)->get();
               $countdata = (count($counTdata));
               $ouput = '<ul class="ul-search">';
               if ($countdata == 0){
                   $ouput .= '<li>
                               <a style="font-size: 13px;" href="sreach?search_product='.$query.'">
                               Xin l???i: Kh??ng c?? s???n ph???m n??o cho t??? kh??a n??y c???a b???n!
                               </a>
                          </li>';
                   }
               else {
                   foreach ($data as $row) {
                       $ouput .= '<li>
                                  <a href="'.route('view.show.detail', ['slug' => $row->product_slug]).'">
                                     <div class="boximg"><img src="../assets/image/product_image/' . $row->product_image . '" alt=""></div>'
                           . $row->product_name . '<br>
                                      <span style="">' . number_format($row->price, 0, '', '.') . 'vn??</span>
                                  </a>
                               </li>';
                   }
               }
               $ouput .= '</ul>';
               $ouput .= '<div class="result">T??m ???????c <a href="'.route('show.search', ['search_product' => $query]).'" style="font-weight: bold; cursor: pointer">'. $countdata .'</a> k???t qu??? v???i t??? kh??a n??y</div>';
               echo $ouput;
           }
       }
    }



}
