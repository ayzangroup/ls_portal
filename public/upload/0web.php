<?php

Route::get('/demo',function(){
  return view('cat_therapy1');
});


Auth::routes();
Route::get('/login',function(){ return redirect('/'); });
Route::get('/register',function(){ return redirect('/'); });

//facebook login
Route::get('login/facebook', 'Auth\FacebookController@redirectToProvider')->name('facebook_login');
Route::get('login/facebook/callback', 'Auth\FacebookController@handleProviderCallback');



Route::get('/', array('as'=>'index','uses'=>'HomeController@index'));

Route::get('about', array('as'=>'about','uses'=>'HomeController@about'));

Route::get('cronjob', 'Admin\NotificationController@cronjob');

Route::get('terms_condition', array('as'=>'terms_condition','uses'=>'HomeController@terms_condition'));
Route::get('cancellation_policy', array('as'=>'cancellation_policy','uses'=>'HomeController@cancellation_policy'));
Route::get('faq', array('as'=>'faq','uses'=>'HomeController@faq'));
Route::get('privacy_policy', array('as'=>'privacy_policy','uses'=>'HomeController@privacy_policy'));

// Route::get('pricing', array('as'=>'pricing','uses'=>'HomeController@pricing'));

// Route::get('service', array('as'=>'service','uses'=>'HomeController@service'));

// Route::get('single', array('as'=>'single','uses'=>'HomeController@single'));
// Route::get('gallery', array('as'=>'gallery','uses'=>'HomeController@gallery'));



Route::get('contact', array('as'=>'contact','uses'=>'HomeController@contact'));
Route::post('/contact','HomeController@submit_contact')->name('submit_contact');


Route::get('/therapies/{id}','TherapyController@cat_therapy')->name('cat_therapy');
Route::get('/therapies','TherapyController@therapies')->name('therapies');
Route::post('/voucher_payment','BookingController@voucher_payment')->name('voucher_payment');
Route::post('/remove_voucher','BookingController@remove_voucher')->name('remove_voucher');

Route::get('blog','BlogController@view_blogs')->name('blog');
Route::get('blog/{id}','BlogController@view_single_blog')->name('single_blog');

Route::get('app_blog','BlogController@view_blogs');
Route::get('app_blog/{id}','BlogController@view_single_blog');

Route::get('/profile','HomeController@profile');
Route::post('/player_id_session','HomeController@set_player_id');

Route::group(['middleware'=>'auth',],function(){
  Route::post('/add_to_cart','CartController@add_to_cart')->name('add_to_cart');
  Route::get('remove_cart_item/{id}','CartController@remove_cart_item')->name('remove_cart_item');
  Route::get('/checkout','CartController@show_checkout')->name('show_checkout');
  Route::post('/checkout','CartController@checkout')->name('checkout');
  Route::get('/my_bookings/{id}','UserController@my_bookings')->name('my_bookings');
  Route::get('/booking_notifications','BookingController@booking_notifications')->name('booking_notifications')->middleware('checkRole:therapist');
  Route::post('/update_profile','HomeController@update_profile')->name('update_profile');

  
});

Route::group(['middleware'=>'checkRole:therapist',],function(){
  Route::get('/accept_bookings/{id}','BookingController@accept_bookings')->name('accept_bookings');
  Route::get('/cancel_booking/{id}','BookingController@cancel_booking')->name('cancel_booking');
  Route::get('/dashboard','TherapistController@dashboard')->name('dashboard');
  Route::get('/upcoming_bookings','TherapistController@upcoming_bookings')->name('upcoming_bookings');
  Route::get('/past_bookings','TherapistController@past_bookings')->name('past_bookings');
  Route::get('/therapist_bookings','TherapistController@therapist_bookings')->name('therapist_bookings');
});
  Route::post('/therapist_logout','TherapistController@therapist_logout')->name('therapist_logout');

Route::get('/get_player_id/{id}',function(){
  return view('get_player_id');
});

Route::get('/app_faq/',function(){
  return view('app_faq');
});


Route::post('/onesignal_id','HomeController@onesignal_id');

//therapist
Route::get('/therapist','TherapistController@therapist')->name('therapist');
Route::post('/therapist_login','TherapistController@therapist_login')->name('therapist_login');
Route::post('/therapist/forgot_password','TherapistController@forgot_password')->name('therapist.forgot_password');





//Admin routes starts
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/',function(){
    return redirect()->route('admin.login');
  });
});//routes are not have admin middleware
