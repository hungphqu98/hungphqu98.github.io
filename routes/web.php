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
Route::get('ajaxpa','AjaxController@ajaxPa')->name('ajaxpa');
Route::get('modal','AjaxController@modal')->name('ajaxpa');

/**
 * Route dành cho tang người dùng
 */


Route::get('forgot','Auth\ForgotPasswordController@forgot')->name('get.form.forgot');
Route::post('forgot','Auth\ForgotPasswordController@postforgot')->name('post.form.forgot');
Route::get('reset','Auth\ForgotPasswordController@reset')->name('get.form.reset');
Route::post('reset','Auth\ForgotPasswordController@postreset')->name('post.form.reset');


Route::post('filter', 'HomeController@filterPrice')->name('filter');
Route::get('/', 'HomeController@index')->name('home');
Route::get('about','HomeController@about')->name('about');
Route::get('404','HomeController@error')->name('404');
Route::get('policy','HomeController@policy')->name('policy');
Route::get('intship','HomeController@intship')->name('intship');
Route::get('shipret','HomeController@shipret')->name('shipret');
Route::get('deliinfo','HomeController@deliinfo')->name('deliinfo');
Route::get('secshop','HomeController@secshop')->name('secshop');
Route::get('faq','HomeController@faq')->name('faq');
Route::get('shop','HomeController@shop')->name('shop');
Route::get('speaker','HomeController@speaker')->name('speaker');
Route::get('spel','HomeController@spel')->name('spel');
	Route::get('pillplus','HomeController@pplus')->name('pplus');
	Route::get('pill2','HomeController@pill2')->name('pill2');
Route::get('headphones','HomeController@head')->name('headphones');
Route::get('headl','HomeController@headl')->name('headl');
	Route::get('solopro','HomeController@solopro')->name('solopro');
	Route::get('studio3','HomeController@studio3')->name('studio3');
	Route::get('solo3','HomeController@solo3')->name('solo3');
	Route::get('beatsep','HomeController@beatsep')->name('beatsep');
	Route::get('beatspro','HomeController@beatspro')->name('beatspro');
	Route::get('nba','HomeController@nba')->name('nba');
	Route::get('club','HomeController@club')->name('club');
	Route::get('matte','HomeController@matte')->name('matte');
	Route::get('camo','HomeController@camo')->name('camo');
Route::get('earphones','HomeController@ear')->name('earphones');
Route::get('earl','HomeController@earl')->name('earl');
	Route::get('powpro','HomeController@powpro')->name('powpro');
	Route::get('beatsx','HomeController@beatsx')->name('beatsx');
	Route::get('pow3','HomeController@pow3')->name('pow3');
	Route::get('urbeats','HomeController@urbeats')->name('urbeats');
Route::get('contact','HomeController@contact')->name('contact');
Route::post('contact','HomeController@post_contact')->name('contact');
Route::get('/{id}-{slug}','HomeController@view_pro')->name('home.view');
Route::get('search','HomeController@search')->name('search');
Route::get('register','HomeController@register')->name('register');
Route::post('register','HomeController@post_register');
Route::get('login','HomeController@login')->name('login');
Route::post('login','HomeController@post_login')->name('login');
Route::get('logout','HomeController@logout')->name('logout');
Route::get('checkout','HomeController@checkout')->name('checkout');
Route::get('my_account','HomeController@account')->name('my_account');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('add_account','Admin\UserController@create')->name('add_account');
Route::post('comment','CommentController@store')->name('comment.store');
Route::get('demo','HomeController@filterPrice')->name('demo');
Route::group(['prefix' => 'wishlist'], function () {
	Route::get('/', 'WishlistController@index')->name('wishlist');
	Route::get('add/{id}', 'WishlistController@add')->name('wishlist.add');
	Route::get('delete/{id}', 'WishlistController@delete')->name('wishlist.delete');
	Route::get('clear', 'WishlistController@clear')->name('cart.clear');
});

Route::group(['prefix' => 'cart'], function () {
	Route::get('/', 'CartController@index')->name('cart');
	Route::get('add/{id}/{quantity?}', 'CartController@add')->name('cart.add');
	Route::get('update/{id}/{quantity?}', 'CartController@update')->name('cart.update');
	Route::get('delete/{id}', 'CartController@delete')->name('cart.delete');
	Route::get('clear', 'CartController@clear')->name('cart.clear');
});
Route::group(['prefix' => 'checkout'], function () {
	Route::get('/', 'CheckoutController@index')->name('checkout');
	Route::post('/', 'CheckoutController@submit')->name('checkout');
	Route::get('/checkout-success', 'CheckoutController@success')->name('checkout.success');
});

/**
 * Route dành cho tang quản trị
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'], function () {
	Route::get('/', 'AdminController@index')->name('admin.index');
	include 'user.php';
	Route::group(['prefix' => 'users'], function () {
		Route::get('/create', 'UserController@create')->name('create');
		Route::get('/', 'UserController@index')->name('admin.users');
		Route::get('delete/{id}', 'UserController@delete')->name('admin.users.delete');
		Route::get('/search','UserController@search')->name('admin.users.search');
	});
	Route::group(['prefix' => 'account'], function () {
		Route::get('/', 'AdminController@account')->name('admin.account');
		Route::get('delete/{id}', 'AdminController@delete')->name('admin.account.delete');
		Route::get('/changePassword','AdminController@getchangePassword')->name('admin.account.change');
		Route::post('/changePassword','AdminController@changePassword')->name('admin.account.change');
		
	});
	Route::group(['prefix' => 'comment'], function () {
		Route::get('/', 'CommentController@index')->name('admin.comment');
		Route::get('edit/{id}', 'CommentController@edit')->name('admin.comment.edit');
		Route::post('update/{id}', 'CommentController@update')->name('admin.comment.update');
		Route::get('delete/{id}', 'CommentController@delete')->name('admin.comment.delete');
		Route::get('/search','CommentController@search')->name('admin.comment.search');
	});
	
	Route::group(['prefix' => 'category'], function () {
		Route::get('/', 'CategoryController@index')->name('admin.category');

		Route::get('/add', 'CategoryController@add')->name('admin.category.add');
		Route::post('/add', 'CategoryController@post_add');

		Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
		Route::post('update/{id}', 'CategoryController@update')->name('admin.category.update');
		Route::get('delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
	});

	Route::group(['prefix' => 'product'], function () {
		Route::get('/', 'ProductController@index')->name('admin.product');
		Route::get('/detail/{id}', 'ProductController@view')->name('admin.product.detail');
		Route::get('/search','ProductController@search')->name('admin.product.search');
		Route::get('/add', 'ProductController@add')->name('admin.product.add');
		Route::post('/add', 'ProductController@post_add');
		Route::get('/hot', 'ProductController@hot')->name('admin.product.hot');
		Route::get('/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
		Route::post('/update/{id}', 'ProductController@update')->name('admin.product.update');
		Route::get('/delete/{id}', 'ProductController@delete')->name('admin.product.delete');
	});

	Route::group(['prefix' => 'banner'], function () {
		Route::get('/', 'BannerController@index')->name('admin.banner');

		Route::get('/add', 'BannerController@add')->name('admin.banner.add');
		Route::post('/add', 'BannerController@post_add');

		Route::get('/edit/{id}', 'BannerController@edit')->name('admin.banner.edit');
		Route::post('/update/{id}', 'BannerController@update')->name('admin.banner.update');
		Route::get('/delete/{id}', 'BannerController@delete')->name('admin.banner.delete');
	});
	Route::group(['prefix' => 'orders'], function () {
		Route::get('/', 'OrderController@index')->name('admin.orders');
		Route::get('/confirm', 'OrderController@confirm')->name('admin.orders.confirm');
		Route::get('/detail/{id}', 'OrderController@view')->name('admin.orders.view');
		Route::get('/edit/{id}', 'OrderController@edit')->name('admin.orders.edit');
		Route::post('/update/{id}', 'OrderController@update')->name('admin.orders.update');
		Route::get('/search','OrderController@search')->name('admin.orders.search');
	});
});

Route::get('admin/login', 'Admin\AdminController@form_login')->name('admin.login');
Route::post('admin/login', 'Admin\AdminController@post_login');
Route::get('admin/register', 'Admin\AdminController@form_register')->name('admin.register');
Route::post('admin/register', 'Admin\AdminController@post_register');
Route::get('admin/forgot','Auth\AdminForgotPasswordController@forgot')->name('get.admin.forgot');
Route::post('admin/forgot','Auth\AdminForgotPasswordController@postforgot')->name('post.admin.forgot');
Route::get('admin/reset','Auth\AdminForgotPasswordController@reset')->name('get.admin.reset');
Route::post('admin/reset','Auth\AdminForgotPasswordController@postreset')->name('post.admin.reset');
Route::get('admin/logout','Admin\AdminController@logout')->name('admin.logout');


