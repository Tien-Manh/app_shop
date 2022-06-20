<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login

Route::get('admin-cp/login', 'Auth\LoginController@Login')->name('login');
Route::post('admin-cp/login', 'Auth\LoginController@PostLogin');
Route::any('admin-cp/logout', 'Auth\LoginController@Logout')->name('logout');

Route::get('login', 'Client\UserController@LoginUser')->name('login.user');
Route::post('login', 'Client\UserController@PostLoginUser');
Route::any('logout', 'Client\UserController@LogoutUser')->name('logout.user');
Route::post('resign', 'Client\UserController@Resign')->name('resign');


//Admin
Route::group(['middleware' => ['auth', 'author.role'], 'prefix' => 'admin-cp'], function(){
    //show
	Route::get('', 'Client\HomeController@AdminCp')->name('Admin.cp');
    Route::get('user-admin', 'Client\UserController@ShowUser')->name('show.userAdmin');
    Route::get('user-member', 'Client\UserController@ShowMember')->name('show.member');
    Route::get('products', 'Client\ProductController@ShowProduct')->name('show.product');
	Route::get('categories', 'Client\CategoriController@ShowCate')->name('show.cate');
	Route::get('{slug}/products', 'Client\CategoriController@ShowlistCp')->name('show.listCp');
	Route::get('orders', 'Client\HomeController@showOreder')->name('show.order');
	Route::get('orders/{id}', 'Client\HomeController@showOrederDetail')->name('show.orderDetail');
	Route::get('baner', 'Client\HomeController@Showbaner')->name('show.baner');
	Route::get('categories/comment/delete/{id}', 'Client\HomeController@deletecm')->name('delete.cm');
	Route::get('categories/commentrp/delete/{id}', 'Client\HomeController@deletecmrp')->name('delete.cmrp');

	//active
    Route::get('save-active', 'Client\HomeController@SaveActive');
    Route::get('{slug}/products/save-active', 'Client\HomeController@SaveActiveCate');
    Route::get('products/save-active', 'Client\HomeController@SaveActiveProduct');
    Route::get('user-member/save-active', 'Client\UserController@SaveActiveUser');
    Route::get('user-admin/save-active', 'Client\UserController@SaveActiveAdmin');
    Route::get('categories/save-active', 'Client\CategoriController@SaveActionCate');
    Route::get('orders/{id}/save-active', 'Client\HomeController@SaveActionOrder');

    //update
    Route::get('category/update/{id}', 'Client\CategoriController@updateCate')->name('update.cate');
    Route::get('product/update/{id}', 'Client\ProductController@updateProduct')->name('update.product');
    Route::get('baner/update/{id}', 'Client\HomeController@updateBaner')->name('update.baner');
    Route::get('baner/save-active', 'Client\HomeController@banerSaveactive');
    //delete
    Route::get('delete-user', 'Client\UserController@removeUser');
    Route::get('delete-user-member', 'Client\UserController@removeUserMember');
    Route::get('products/delete-product', 'Client\ProductController@removeProduct');
    Route::get('{slug}/products/delete-product', 'Client\ProductController@removeProduct');
    Route::get('categories/delete-categorie', 'Client\CategoriController@removeCate');
    Route::get('baner/delete', 'Client\HomeController@removeBaner');
    //add
    Route::get('category/add', 'Client\CategoriController@addCate')->name('add.cate');
    Route::get('product/add', 'Client\ProductController@addProduct')->name('add.product');
    Route::get('user-admin/add', 'Client\UserController@addAuth')->name('add.author');
    Route::get('baner/add', 'Client\HomeController@banerAdd')->name('add.baner');
    Route::get('code-countpoin/add', 'Client\HomeController@codecountAdd')->name('add.codecount');
    //save
    Route::post('save', 'Client\CategoriController@saveCate')->name('save.cate');
    Route::post('save-update', 'Client\CategoriController@saveUpdateCate')->name('save.cate.update');
    Route::post('product/save', 'Client\ProductController@saveProduct')->name('save.product');
    Route::post('product/save-update', 'Client\ProductController@saveUpdateProduct')->name('save.update.product');
    Route::post('user/save', 'Client\UserController@saveAuth')->name('save.user');
    Route::post('baner/save', 'Client\HomeController@saveBaner')->name('save.baner');
    Route::post('baner/save-update', 'Client\HomeController@saveBanerUpdate')->name('save.banerUpdate');
    Route::get('code-countpoin', 'Client\HomeController@codecountpoinShow')->name('show.codecountpoin');
    Route::post('code-countpoin/save', 'Client\HomeController@codecountpoinSave')->name('save.codecountpoin');

    Route::get('infor', 'Client\UserController@showInfo')->name('show.info');
    Route::post('infor/save_info', 'Client\UserController@saveInfo')->name('save.info');
    Route::post('infor/save_avatar', 'Client\UserController@saveAvatar')->name('save.avatar');
    Route::post('infor/save_password', 'Client\UserController@savePassword')->name('save.pass');

});

Route::post('save-cart', 'Client\HomeController@saveCart')->name('save.cart');

Route::group(['middleware' => 'auth'], function (){
  Route::get('like/{id}', 'Client\HomeController@Addlike')->name('add.like');
  Route::get('info', 'Client\UserController@ShowUserInfo')->name('show.infomem');
  Route::post('change-password/save_password', 'Client\UserController@savePassword')->name('save.pass');
  Route::get('change-password', 'Client\UserController@ChangePass')->name('change.pass');
});
Route::group(['middleware' => ['web']], function (){
    Route::get('add-card', 'Client\HomeController@addCart')->name('add.card');
    Route::get('your-cart', 'Client\HomeController@showCart')->name('show.card');
    Route::post('counpoin', 'Client\HomeController@addCountpoin')->name('add.count');
    Route::get('remove-all', 'Client\HomeController@delAllcart')->name('delete.card');
    Route::get('remove-one/{id}', 'Client\HomeController@delOnecart')->name('delete.onecart');
    Route::get('your-cart/checkout', 'Client\HomeController@checkOunt')->name('check.onecart');
    Route::post('post/comment', 'Client\HomeController@postComment')->name('post.comment');
    Route::post('post/reply', 'Client\HomeController@postReply')->name('post.reply');
});

//End Quan-tri-vien

// wiews
Route::get('/', 'Client\HomeController@ViewShow')->name('view.show');
Route::get('product/{product_slug}', 'Client\HomeController@viewsDetail')->name('view.show.detail');
Route::get('products', 'Client\ProductController@showProducts')->name('show.products');
Route::get('products/ajax', 'Client\ProductController@AjaxshowProducts')->name('search.ajax');
Route::get('categories/{cate_slug}', 'Client\CategoriController@showCateView')->name('show.cates');
Route::get('sreach', 'Client\ProductController@searchPr')->name('show.search');
Route::get('giam-gia', 'Client\ProductController@saLe')->name('show.sale');



//Reset.pass
Route::post('reset', "Client\HomeController@ResetPass")->name('reset.password');
Route::get('reset-pwd/{token}', "Client\HomeController@Pwd");
Route::post('auth-reset-pwd', "Client\HomeController@ResetPWD")->name('auth-reset-pwd');



