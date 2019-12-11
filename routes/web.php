<?php
//public route
Route::get('/','publicPage@index');
Route::get('/index','publicPage@index');
Route::get('/about','publicPage@about');
Route::get('/login','publicPage@login')->name('login');
Route::get('/register','publicPage@register');
Route::get('/blog','UserController@showBlog');
Route::get('/room','publicPage@room');
Route::get('/single_room/{id_room_type}','publicPage@singleRoom');


//route admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('/quanly/{option?}/{id?}','adminController@quanly');
        // function($option=null) {
        // return view('admin.dashboard');
    // });
    // update_ad_password
    Route::post('/quanly/update_ad_password','adminController@updateAdPassword')->name('update_ad_password');
    Route::post('/quanly/insert_room_type','adminController@insertRoomType')->name('insert_room_type');
    Route::post('/quanly/edit_room_type','adminController@editRoomType')->name('edit_room_type');
    Route::post('/quanly/delete_room_type','adminController@editRoomType')->name('delete_room_type');
    Route::post('/quanly/insert_room','adminController@insertRoom')->name('insert_room');
    Route::post('/quanly/edit_room','adminController@editRoom')->name('edit_room');
});
//route user
Route::group(['prefix'=>'user','middleware'=>'userLogin'],function(){
    Route::get('/booking_form','publicPage@booking');
    Route::get('/profile','UserController@showProfileUser');
    Route::get('/phong_da_book','UserController@showPhongDaBook');
    Route::get('/delete_booked/{id}','UserController@deleteBooked')->name('delete_booked');
    Route::post('/edit_profile_user','UserController@editProfileUser')->name('edit_profile_user');
});
//login hander,when login success, session setted with variable 'login'
Route::post('dangnhap','UserController@login')->name('dangnhap');
Route::post('register', 'publicPage@dangki');
Route::post('booking', 'publicPage@postbooking')->name('booking');
Route::post('feedback', 'publicPage@postFeedback')->name('feedback');
Route::post('setpassword','UserController@setPassword')->name('setpassword');
Route::put('setpassword','UserController@putPassword')->name('postpassword');
Route::get('/auth/{provider}','SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback','SocialAuthController@handleProviderCallback');
Route::get('/qr-code','QrCodeController@getQrCode');
