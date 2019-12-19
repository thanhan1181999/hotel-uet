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

Route::get('/', 'pageController@getHome');
Route::get('home', 'pageController@getHome');
Route::get('about', 'pageController@getAbout');
Route::get('blog','pageController@getBlog');
Route::get('room','pageController@getRoom')->name('room');
Route::get('single_room/{id}','pageController@getDetailRoom');
Route::group(['prefix'=>'ajax'],function() {
	Route::get('room_type/{id}','ajaxController@getRoomType');
});
Route::post('feedback','pageController@postFeedback');
Route::post('suggest','pageController@suggestRoom');
// Route::get('login','pageController@login');
// đăng nhập qua facebook, google
Route::get('redirect/{social}', 'loginController@redirect');
Route::get('callback/{social}', 'loginController@callback');
Route::get('logout','logoutController@logout');
Route::get('profile','accountController@showProfile')->name('profile');
Route::post('editProfile','accountController@editProfile');
Route::group(['prefix'=>'account','middleware'=>'login'],function() {
	Route::post('booking','accountController@booking');
	Route::get('phong_da_book','accountController@showBooked');
	Route::get('deletebooked','accountController@deletebooked');
	Route::post('create_pay','payController@create_pay');
	Route::get('return_vnpay','payController@return_vnpay');
	Route::get('thanhtoan', 'payController@checkInfoPay');
});
Route::group(['prefix'=>'admin','middleware'=>'loginadmin'], function() {
	Route::group(['prefix'=>'quanly'],function() {
		Route::get('/', 'adminController@showQuanLy');
		#feedback
		Route::get('feedback','adminController@feedback');
		Route::get('delete_feedback','adminController@delete_feedback');
		#room_type
		Route::get('room_type','adminController@room_type');
		Route::get('xoa_room_type','adminController@xoa_room_type');
		Route::get('sua_room_type','adminController@getsua_room_type');
		Route::post('sua_room_type','adminController@postsua_room_type');
		Route::get('them_room_type','adminController@getthem_room_type');
		Route::post('them_room_type','adminController@postthem_room_type');
		#blog
		Route::get('blog','adminController@blog');
		Route::get('xoa_blog','adminController@xoa_blog');
		Route::get('sua_blog','adminController@getsua_blog');
		Route::post('sua_blog','adminController@postsua_blog');
		Route::get('them_blog','adminController@getthem_blog');
		Route::post('them_blog','adminController@postthem_blog');
		#room
		Route::get('room','adminController@room');
		Route::get('xoa_room','adminController@xoa_room');
		Route::get('sua_room','adminController@getsua_room');
		Route::post('sua_room','adminController@postsua_room');
		Route::get('them_room','adminController@getthem_room');
		Route::post('them_room','adminController@postthem_room');
		#booking_details
		Route::get('booking_details','adminController@booking_details');
		Route::get('delete_booked','adminController@delete_booked');
		#handle checkin, out at hotel
		Route::get('check_ỉn_room','adminController@check_ỉn_room');
		Route::get('check_out_room','adminController@check_out_room');
	});
});