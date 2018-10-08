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
//For Website

Route::get('/', 'WebsiteController@index')->name('/');
Route::get('/refer_register/{id}', 'WebsiteController@refer_register')->name('/refer_register');

Route::get('/index', 'WebsiteController@index')->name('index');

Route::get('/contact', 'WebsiteController@contact')->name('contact');

Route::get('/faq', 'WebsiteController@faq')->name('faq');

Route::get('/price_calculator', 'WebsiteController@price_calculator')->name('price-calculator');

Route::get('/serve', 'WebsiteController@serve')->name('serve');

Route::get('/terms_and_condition', 'WebsiteController@terms_and_condition')->name('terms_and_condition');

Route::get('/privacy_policy', 'WebsiteController@privacy_policy')->name('privacy_policy');

Route::get('/list_your_business_now', 'WebsiteController@list_your_business_now')->name('list_your_business_now');

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('auth/google', ['as' => 'auth/google', 'uses' => 'Auth\LoginController@redirectToGoogle']);

Route::get('auth/google/callback', ['as' => 'auth/google/callback', 'uses' => 'Auth\LoginController@handleGoogleCallback']);

Route::post('submit_user', 'WebsiteController@submit_user')->name('submit_user');

Route::post('request', 'WebsiteController@request')->name('request');

Route::post('help', 'WebsiteController@help')->name('help');

Route::post('/add_item','WebsiteController@add_item')->name('add_item');

Route::post('/save-item','WebsiteController@saveItem')->name('save-item');

Route::post('/saveitem','WebsiteController@saveorder')->name('saveitem');

Route::post('/remove_item','WebsiteController@remove_item')->name('remove_item');

Route::get('/get_player_id/{id}',function(){
  return view('get_player_id');
});
Route::post('player_id_session','NotificationController@set_player_id');
Route::post('onesignal_id','NotificationController@onesignal_id');



 //Password mail Routes for the api by shoeb 26-04-2018
 Route::get('user/reset/{verification_code}/{userType}', 'Api\AuthController@verifyLinkPassword');
Route::get('driver/reset/{verification_code}/{userType}', 'Api\driverController@verifyLinkPassword');
Route::get('laundry/reset/{verification_code}/{userType}', 'Api\laundryController@verifyLinkPassword');
 Route::get('user/verify/{verification_code}/{userType}', 'Api\AuthController@verifyUser');
 Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
 Route::post('password/reset', 'Auth\PasswordController@reset');
//Driver mail Register
Route::get('driver/password/{emailId}', 'DriverAuth\PasswordController@showPasswordForm')->name('driver.password');
Route::post('driver/password', 'DriverAuth\PasswordController@password_register')->name('driver.password');
//Laundry Mail Register
Route::get('laundry/password/{emailId}', 'LaundryAuth\PasswordController@showPasswordForm')->name('laundry.password');
Route::post('laundry/password', 'LaundryAuth\PasswordController@password_register')->name('laundry.password');

//Admin routes starts
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login')->name('login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/',function(){
    return redirect('/admin/login');
  });
});//routes are not have admin middleware


//individual routes starts
Route::group(['prefix' => 'user', 'as'=>'user.'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm');
  Route::post('/login', 'UserAuth\LoginController@login')->name('login');
  Route::post('logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/',function(){
    return redirect('/user/login');
  });
});

//Corp routes starts
Route::group(['prefix' => 'corpuser', 'as'=>'corpuser.'], function () {
  Route::get('/login', 'CorpuserAuth\LoginController@showLoginForm');
  Route::post('/login', 'CorpuserAuth\LoginController@login')->name('login');
  Route::post('logout', 'CorpuserAuth\LoginController@logout')->name('logout');

  Route::get('/',function(){
    return redirect('/corpuser/login');
  });
});


//driver routes starts
Route::group(['prefix' => 'driver', 'as'=>'driver.'], function () {
  Route::get('/login', 'DriverAuth\LoginController@showLoginForm');
  Route::post('/login', 'DriverAuth\LoginController@login')->name('login');
  Route::post('logout', 'DriverAuth\LoginController@logout')->name('logout');

  Route::get('/',function(){
    return redirect('/driver/login');
  });
});

Route::group(['prefix' => 'laundry', 'as'=>'laundry.'], function () {
  Route::get('/login', 'LaundryAuth\LoginController@showLoginForm');
  Route::post('/login', 'LaundryAuth\LoginController@login')->name('login');
  Route::post('logout', 'LaundryAuth\LoginController@logout')->name('logout');

  Route::get('/',function(){
    return redirect('/laundry/login');
  });
});


Route::get('login', 'UserAuth\LoginController@showLoginForm')->name('login');

//For Login
Route::post('login', 'Auth\LoginController@login')->name('login');

//For Register
Route::post('register', 'Auth\RegisterController@register')->name('register');

//For Forgot Password
Route::post('forgot_password', 'Auth\ForgotPasswordController@forgot')->name('forgot_password');
Route::get('driver_forgot_password_form', 'Driver\ForgotPasswordController@forgot_form')->name('driver_forgot_password_form');
Route::post('driver_forgot_password', 'Driver\ForgotPasswordController@forgot')->name('driver_forgot_password');
Route::get('laundry_forgot_password_form', 'Laundry\ForgotPasswordController@forgot_form')->name('laundry_forgot_password_form');
Route::post('laundry_forgot_password', 'Laundry\ForgotPasswordController@forgot')->name('laundry_forgot_password');

Route::get('admin_forgot_password_form', 'AdminAuth\ForgotPasswordController@forgot_form')->name('admin_forgot_password_form');
Route::post('admin_forgot_password', 'AdminAuth\ForgotPasswordController@forgot')->name('admin_forgot_password');

//Admin Register
Route::post('admin/register', 'Admin\UserController@register')->name('admin.register');

//Driver Register
Route::get('driver/register', 'DriverAuth\RegisterController@showRegistrationForm')->name('driver.register');
Route::post('driver/register', 'DriverAuth\RegisterController@register')->name('driver.register');

//Laundry Register
Route::get('laundry/register', 'LaundryAuth\RegisterController@showRegistrationForm')->name('laundry.register');
Route::post('laundry/register', 'LaundryAuth\RegisterController@register')->name('laundry.register');

Route::get('returnurl', 'User\PaymentController@returnurl')->name('returnurl');

