<?php

namespace App\Http\Controllers\Client;

use App\MemberAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Users;
use Validator;
use DB;
use File;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function ShowUser(){
        $users = Users::all();
        return view('admin.admin-user', ['users' => $users]);
    }
    function removeUser(Request $rq){
        if (Auth::user()->role == 2) {
            $user = Users::find($rq['getId']);
            $user->delete();
            return response()->json();
        }
        else{
            return view('error.404');
        }

    }
    function SaveActiveAdmin(Request $rq){
        if (Auth::user()->role == 2) {
            $user = Users::find($rq['getId']);
            $user->update(['active' => $rq['value']]);
            return response()->json();
            }
        else{
            return view('error.404');
        }
    }

    function ShowMember(){
        $users = Users::all();
        return view('admin.admin-user-member', ['users' => $users]);
    }
    function SaveActiveUser(Request $rq){
        if (Auth::user()->role == 2) {
            $user = Users::find($rq['getId']);
            $user->update(['active' => $rq['value']]);
            return response()->json();
        }
        else{
            return view('error.404');
        }
    }
    function removeUserMember(Request $rq){
        if (Auth::user()->role == 2) {
            $user = Users::find($rq['getId']);
            $user->delete();
            return response()->json();
        }
        else{
                return view('error.404');
            }
    }

    function addAuth(){
        if (Auth::user()->role == 2) {
            return view('user.user-form');
        }
        else{
                return view('error.404');
            }
    }

    function saveAuth(Request $rq){
        $rule = [
            'add_email' => 'required|email|unique:users,email',
            'add_name' => 'required|min:4|max:20',
            'add_name_login' => 'required|min:4|max:20|unique:users,name_login',
            'add_password' => 'required|min:6|max:50',
            'add_password_confir' => 'required|same:add_password'
        ];
        $message = [
            'add_email.required' => 'B???n ch??a nh???p email',
            'add_email.unique' => 'Email ???? ???????c s??? d???ng',
            'add_email.email' => 'Email sai ?????nh d???ng',
            'add_name.required' => 'B???n ch??a nh???p t??n',
            'add_name.min' => 'T??n ph???i t??? 4 k?? t???',
            'add_name.max' => 'T??n kh??ng qu?? 20 k?? t???',
            'add_name_login.required' => 'B???n ch??a nh???p t??n ????ng  nh???p',
            'add_name_login.min' => 'T??n ????ng  nh???p ph???i t??? 4 k?? t???',
            'add_name_login.max' => 'T??n ????ng nh???p kh??ng qu?? 20 k?? t???',
            'add_name_login.unique' => 'T??n ????ng nh???p n??y ???? ???????c d??ng',
            'add_password.required' => 'B???n ch??a nh???p m???t kh???u',
            'add_password.min' => 'M???t kh???u ph???i t??? 6 k?? t???',
            'add_password.max' => 'M???t kh???u kh??ng qu?? 50 k?? t???',
            'add_password_confir.same' => 'M???t kh???u nh???p l???i kh??ng kh???p v???i m???t kh???u',
            'add_password_confir.required' => 'B???n ch??a nh???p l???i m???t kh???u'
        ];
        $resign = Validator::make($rq->all(), $rule, $message);
        if ($resign->passes()) {
            DB::table('users')->insert([
                'name' => $rq->add_name,
                'name_login' => $rq->add_name_login,
                'email' => $rq->add_email,
                'password' => Hash::make($rq->add_password),
                'role' => $rq->add_role,
                'active' => 0,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            return response()->json();
        }

        return response()->json([
            'error' => true,
            'message' => $resign->errors()
        ], 200);
    }

    function LoginUser(){
        if (Auth::user() == true) {
            return redirect()->route('view.show');
        }
        else {
            return view('auth.login-view');
        }
    }
    function PostLoginUser(Request $rq){
        if (Auth::attempt(['name_login' => $rq->name_login, 'password' => $rq->password, 'active' => 0], $rq->remember)
            || Auth::attempt(['email' => $rq->name_login, 'password' => $rq->password, 'active' => 0], $rq->remember))
            {
                return redirect()->route('view.show');
            }
            elseif(Auth::attempt(['name_login' => $rq->name_login, 'password' => $rq->password, 'active' => 1], $rq->remember)
                || Auth::attempt(['email' => $rq->name_login, 'password' => $rq->password, 'active' => 1], $rq->remember))
            {
                Auth::logout();
                return redirect()->route('login.user')->with('errMsg', "T??i kho???n c???a b???n t???m th???i b??? kh??a!");
            }
            else{
                return redirect()->route('login.user')->with('errMsg', "Sai t??n ????ng nh???p ho???c m???t kh???u!");
            }
     }
    function LogoutUser(){
        Auth::logout();
        return redirect()->route('login.user');
    }


    function resign(Request $rq){
        $rule = [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:4|max:20',
            'name_login' => 'required|min:4|max:20|unique:users,name_login',
            'password' => 'required|min:6|max:50',
            'password_confirmation' => 'required|same:password'
        ];
        $message = [
            'email.required' => 'B???n ch??a nh???p email',
            'email.unique' => 'Email ???? ???????c s??? d???ng',
            'email.email' => 'Email sai ?????nh d???ng',
            'name.required' => 'B???n ch??a nh???p t??n',
            'name.min' => 'T??n ph???i t??? 4 k?? t???',
            'name.max' => 'T??n kh??ng qu?? 20 k?? t???',
            'name_login.required' => 'B???n ch??a nh???p t??n ????ng  nh???p',
            'name_login.min' => 'T??n ????ng  nh???p ph???i t??? 4 k?? t???',
            'name_login.max' => 'T??n ????ng nh???p kh??ng qu?? 20 k?? t???',
            'name_login.unique' => 'T??n ????ng nh???p n??y ???? ???????c d??ng',
            'password.required' => 'B???n ch??a nh???p m???t kh???u',
            'password.min' => 'M???t kh???u ph???i t??? 6 k?? t???',
            'password.max' => 'M???t kh???u kh??ng qu?? 50 k?? t???',
            'password_confirmation.same' => 'M???t kh???u nh???p l???i kh??ng kh???p v???i m???t kh???u',
            'password_confirmation.required' => 'B???n ch??a nh???p l???i m???t kh???u'

        ];
        $resign = Validator::make($rq->all(), $rule, $message);
        if ($resign->passes()) {
           DB::table('users')->insert([
                'name' => $rq->name,
                'name_login' => $rq->name_login,
                'email' => $rq->email,
                'password' => Hash::make($rq->password),
                'role' => 0,
                'active' => 0,
                'created_at' => date('Y-m-d h:i:s')
           ]);
            return response()->json();
        }

        return response()->json([
            'error' => true,
            'message' => $resign->errors()
        ], 200);

    }
    function ShowUserInfo(){
        $show = false;
        if (!empty(Auth::user())){
            $user = Users::find(Auth::user()->id);
            $user_address = DB::table('users')
                ->join('users_address', 'users_address.user_id', '=', 'users.id')
                ->where('user_id' ,Auth::user()->id)
                ->select('name', 'first_name', 'email', 'avatar', 'phone', 'gender', 'province', 'ward')->first();
        }

        return view('view.profile-user', ['show' => $show, 'user' => $user, 'user_address' => $user_address]);
    }
    function showInfo(){
        $show = false;
       if (!empty(Auth::user())){
           $user = Users::find(Auth::user()->id);
           $user_address = DB::table('users')
               ->join('users_address', 'users_address.user_id', '=', 'users.id')
               ->where('user_id' ,Auth::user()->id)
               ->select('name', 'first_name', 'email', 'avatar', 'phone', 'gender', 'province', 'ward')->first();
         }
         if (empty($user_address)){
             $show = true;
             $user_address = new MemberAddress();
         }
        return view('admin.profio-admin', ['show' => $show, 'user' => $user, 'user_address' => $user_address]);
    }
    function saveInfo(Request $rq){
        $user = Users::find(Auth::user()->id);
        $user_address = DB::table('users')
            ->join('users_address', 'users_address.user_id', '=', 'users.id')
            ->where('user_id' ,Auth::user()->id)->first();
        $user->first_name = $rq->first_name;
        $user->save();
        if (empty($user_address)){
            $user_address = new MemberAddress();
            $user_address->user_id = $user->id;
            $user_address->phone = $rq->phone;
            $user_address->gender = $rq->gender;
            $user_address->province = $rq->province;
            $user_address->ward = $rq->ward;
            $user_address->save();
        }
        else{
            $user_address = MemberAddress::where('user_id', $user->id)->first();
            $user_address->phone = $rq->phone;
            $user_address->gender = $rq->gender;
            $user_address->province = $rq->province;
            $user_address->ward = $rq->ward;
            $user_address->save();
        }
        return redirect()->back();
    }
    function saveAvatar(Request $rq){
        if (Auth::user()){
            $user = Users::find(Auth::user()->id);
            if ($rq->hasFile('avatar')) {
                $file = $rq->avatar;
                $file_x = $user->avatar;
                $filename = time().$file->getClientOriginalName();
                File::delete('assets/image/avatar/'. $file_x);
                $file->move('assets/image/avatar', $filename);
            }
            if ($rq->hasFile('avatar') == '') {
                $filename = $user->avatar;
            }
            $user->fill($rq->all());
            $user->avatar = $filename;
            $user->save();
            return redirect()->back()->with(['flash_message' => 'Thay avatar th??nh c??ng']);
        }
    }
    function ChangePass(){
        if (Auth::user()){
            $user = Users::find(Auth::user()->id);
            return view('view.change-pass', ['user' => $user]);
        }
    }
    function savePassword(Request $rq){
        $rule = [
            'password' => 'required',
            'new_password' => 'required|min:6|max:50',
            'password_confirmation' => 'required|same:new_password'
        ];
        $message = [
            'password.required' => 'B???n ch??a nh???p m???t kh???u c??',
            'new_password.required' => 'B???n ch??a nh???p m???t kh???u m???i',
            'new_password.min' => 'M???t kh???u m???i ph???i t??? 6 k?? t???',
            'new_password.max' => 'M???t kh???u m???i kh??ng qu?? 50 k?? t???',
            'password_confirmation.same' => 'M???t kh???u nh???p l???i kh??ng kh???p v???i m???t kh???u m???i',
            'password_confirmation.required' => 'B???n ch??a nh???p l???i m???t kh???u'

        ];
        $pass = Validator::make($rq->all(), $rule, $message);

        if ($rq->ajax()){
            $user = Users::find(Auth::user()->id);
            $curpassword = $rq->password;
            $modelpassword = $user->password;

               if (Hash::check($curpassword, $modelpassword)) {
                  if (count($pass->errors()) > 0){
                      return response()->json([
                          'error' => true,
                          'message' => $pass->errors()
                      ], 200);
                  }
                   $user->password = Hash::make($rq->new_password);
                   $user->save();
                   return response()->json('success');

               }
               else{
                   return response()->json([
                       'error' => true,
                       'messages' => 'M???t kh???u c?? kh??ng ch??nh x??c',
                       'message' => $pass->errors()
                   ], 200);
               }

        }
        return response()->json([
            'error' => true,
            'message' => $pass->errors()
        ], 200);

    }


}
