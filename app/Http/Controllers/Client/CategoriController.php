<?php

namespace App\Http\Controllers\Client;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use Validator;
use DB;
use File;

class CategoriController extends Controller
{
    function ShowCate(){
         $cate = Categories::all();
    	return view('admin.admin-categories', ['cate' => $cate]);
    }
    function ShowlistCp($slug){
        $cate = Categories::where('cate_slug', $slug)->firstOrFail();
        $products = DB::table('product_details')->join('products', 'products.id',
            '=', 'product_details.product_id')->where('cate_id', $cate->id)->get();
       return view('admin.ajax.productlist-shop', ['products' => $products]);
    }
    function SaveActionCate(Request $rq){
        $cate = Categories::find($rq['getId']);
        $cate->update(['cate_active' => $rq['value']]);
        return response()->json();
    }

    function showCateView(Request $rq, $id){
        $title ='Danh mục sản phẩm';
        $getShow = $rq['value'];
        $listcount = 9;
        $colum = 'products.id';
        $desc = $rq['desc'];
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
        if ($getShow != ''){
            $listcount = $getShow;
        }
        $category = Categories::where('cate_active', 0)->get();
        $cate = Categories::where('cate_slug', $id)->first();
        $products = DB::table('product_details')
            ->join('products', 'products.id',
                '=', 'product_details.product_id')->orderBy($colum, $desc)
            ->where('product_active', 0)->where('cate_id', $cate->id)->paginate($listcount);
        if ($rq->ajax()){
            return response()->json(view('view.product_ajax')->with('products', $products)->render());
        }
        return view('view.products', ['category' => $category, 'title' => $title, 'cate' => $cate, 'products' => $products]);
    }

    function addCate(){
        $nameShow = 'Thêm Danh Mục';
        $cate = new Categories();
        $parent_cate = Categories::select('id', 'cate_name', 'parent_id')->get();
        return view('cate.form', ['cate' => $cate, 'nameShow' => $nameShow, 'parent_cate' => $parent_cate]);
    }

    function updateCate($id){
        $nameShow = 'Sửa Danh Mục';
        $cate = Categories::find($id);
        $parent_cate = Categories::select('id', 'cate_name', 'parent_id')->where('parent_id', '<>', $id)->get();
        return view('cate.form', ['cate' => $cate, 'nameShow' => $nameShow, 'parent_cate' => $parent_cate]);
    }
    function removeCate(Request $rq){
        $parent = Categories::where('parent_id', $rq['getId'])->count();
        $parent_pr = DB::table('categories')->join('products', 'categories.id', '=', 'cate_id')->where('cate_id', $rq['getId'])->count();
        if($parent == 0 && $parent_pr == 0){
            $cate = Categories::find($rq['getId']);
            $filename = $cate->cate_image;
            if ($filename != null || $filename != ''){
                File::delete('assets/image/cate_image/' . $filename);
            }
            $cate->delete();
            return response()->json();
        }
        else{
            return response()->json([
                'error' => true
            ]);
        }
    }

    function saveUpdateCate(Request $rq){
        $filename = '';
        $rule =  [
            'cate_name' => 'required|min:2|max:80|unique:categories,cate_name,'.$rq->id.',id',
            'cate_slug' => 'required|min:2|max:80|unique:categories,cate_slug,'.$rq->id.',id',
            'cate_image' => 'nullable|image:jpg,jpeg,png|max:2024',
        ];
        $message = [
            'cate_name.required' => 'Tên không được để trống',
            'cate_name.min' => 'Tên phải từ 2 ký tự',
            'cate_name.max' => 'Tên không quá 80 ký tự',
            'cate_name.unique' => 'Tên này đã được dùng',
            'cate_slug.required' => 'Đường dẫn không được để trống',
            'cate_slug.min' => 'Đường dẫn phải từ 2 ký tự',
            'cate_slug.max' => 'Đường dẫn không quá 80 ký tự',
            'cate_slug.unique' => 'Đường dẫn này đã được dùng',
            'cate_image.image' => 'Ảnh phải có định dạng .JPG, .JPEG, .PNG',
            'cate_image.max' => 'Ảnh vượt quá kích cỡ cho phép'
        ];
        $update = Validator::make($rq->all(), $rule, $message);
        if ($update->passes()){
            $slug = $this->to_slug($rq->cate_slug);
            $cate = Categories::find($rq->id);
            if ($rq->hasFile('cate_image')) {
                $file = $rq->cate_image;
                $file_x = $cate->cate_image;
                $filename = time().$file->getClientOriginalName();
                File::delete('assets/image/cate_image/'. $file_x);
                $file->move('assets/image/cate_image', $filename);
            }
            if ($rq->hasFile('cate_image') == '') {
                $filename = $cate->cate_image;
            }
            DB::table('categories')->where('id', $rq->id)->update([
                'cate_name' => $rq->cate_name,
                'cate_slug' => $slug,
                'parent_id' => $rq->parent_id,
                'cate_active' => $rq->cate_active,
                'cate_image' => $filename,
                'updated_at' => date('Y-m-d h:i:s')
            ]);
            return redirect()->route('show.cate');
        }
        return response()->json([
            'error' => true,
            'message' => $update->errors()
        ], 200);
    }
    function saveCate(Request $rq){
        $filename = '';
        $rule = [
            'cate_name' => 'required|unique:categories|min:2|max:80',
            'cate_slug' => 'required|unique:categories|min:2|max:80',
            'cate_image' => 'nullable|image:jpg,jpeg,png|max:2024',
            'parent_id' => 'required|not_in:-1'
        ];
        $message = [
                'cate_name.required' => 'Tên không được để trống',
                'cate_name.min' => 'Tên phải từ 2 ký tự',
                'cate_name.max' => 'Tên không quá 80 ký tự',
                'cate_name.unique' => 'Tên này đã được dùng',
                'cate_slug.required' => 'Đường dẫn không được để trống',
                'cate_slug.min' => 'Đường dẫn phải từ 2 ký tự',
                'cate_slug.max' => 'Đường dẫn không quá 80 ký tự',
                'cate_slug.unique' => 'Đường dẫn này đã được dùng',
                'cate_image.image' => 'Ảnh phải có định dạng .JPG, .JPEG, .PNG',
                'cate_image.max' => 'Ảnh vượt quá kích cỡ cho phép',
                'parent_id.required' => 'Chưa chọn danh mục cha'
        ];
        $add = Validator::make($rq->all(), $rule, $message);
        if ($add->passes()) {
            if ($rq->hasFile('cate_image')) {
                $file = $rq->cate_image;
                $filename = time().$file->getClientOriginalName();
                $file->move('assets/image/cate_image', $filename);
            }
            $slug = $this->to_slug($rq->cate_slug);
            DB::table('categories')->insert([
                'cate_name' => $rq->cate_name,
                'cate_slug' => $slug,
                'parent_id' => $rq->parent_id,
                'cate_active' => $rq->cate_active,
                'cate_image' => $filename,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            return redirect()->route('show.cate');
        }
        return response()->json([
            'error' => true,
            'message' => $add->errors()
        ], 200);
    }

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

}

