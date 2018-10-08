<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', array('middleware' => 'cors', 'uses' => 'Api\AuthController@register'));
Route::post('login', array('middleware' => 'cors', 'uses' => 'Api\AuthController@login'));
Route::get('getUserData', array('middleware' => 'cors', 'uses' => 'Api\AuthController@getUserData'));
Route::get('userProfileDetails', array('middleware' => 'cors', 'uses' => 'Api\AuthController@userProfileDetails'));
Route::get('getServices', array('middleware' => 'cors', 'uses' => 'GeneralController@getAllServices'));
Route::get('getCategory', array('middleware' => 'cors', 'uses' => 'GeneralController@getAllCategory'));
Route::get('userprofile', array('middleware' => 'cors', 'uses' => 'Api\ProfileController@userprofile'));
Route::post('saveAddress', array('middleware' => 'cors', 'uses' => 'Api\AuthController@saveAddress'));
Route::post('getAddress', array('middleware' => 'cors', 'uses' => 'Api\AuthController@getAddress'));
Route::get('getAllHeaders', array('middleware' => 'cors', 'uses' => 'Api\AuthController@getAllHeaders'));
Route::any('editprofile', array('middleware' => 'cors', 'uses' => 'Api\AuthController@editprofile'));
Route::any('sendLinkForgot', array('middleware' => 'cors', 'uses' => 'Api\AuthController@sendLinkForgot'));
Route::any('user/set-new-password', array('middleware' => 'cors', 'uses' => 'Api\AuthController@setNewPassword'));
Route::any('corp/set-new-password', array('middleware' => 'cors', 'uses' => 'Api\AuthController@setNewPassword'));
Route::any('is-email-exist', array('middleware' => 'cors', 'uses' => 'Api\AuthController@isEmailExist'));
Route::any('is-mobile-exist', array('middleware' => 'cors', 'uses' => 'Api\AuthController@isMobileExist'));

Route::any('logout', array('middleware' => ['cors','jwt.auth'], 'uses' => 'Api\AuthController@logout'));

Route::post('updateprofile/{id}', 'Api\AuthController@updateprofile');
Route::post('recover', 'Api\AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function() {
    //Route::any('logout', 'AuthController@logout');
    Route::get('test', function(){
        $token = JWTAuth::getToken();
        return response()->json(['foo'=>'bar','token' => $token]);
    });
});

//For CMS
Route::get('faqDetails','Api\CMSController@faqDetails');
Route::get('termDetails','Api\CMSController@termDetails');
Route::get('privacyDetails','Api\CMSController@privacyDetails');
Route::get('bannerDetails','Api\CMSController@bannerDetails');
Route::get('serveDetails','Api\CMSController@serveDetails');
Route::get('processDetails','Api\CMSController@processDetails');
Route::get('whyusDetails','Api\CMSController@whyusDetails');
Route::get('blogDetails','Api\CMSController@blogDetails');
Route::post('sms_api','Api\CMSController@sms_api');

//For Driver

Route::post('driver/login', array('middleware' => 'cors', 'uses' => 'Api\driverController@driverlogin'));
Route::post('driver/details', array('uses' => 'Api\driverController@getDriverData'));
Route::post('driver/sendLinkForgot', array('middleware' => 'cors', 'uses' => 'Api\driverController@sendLinkForgot'));
Route::post('driver/set-new-password', array('middleware' => 'cors', 'uses' => 'Api\driverController@setNewPassword'));

//For Laundryman

Route::post('laundry/login', array('middleware' => 'cors', 'uses' => 'Api\laundryController@laundryLogin'));
Route::post('laundry/details', array('uses' => 'Api\laundryController@getLaundryData'));
Route::post('laundry/sendLinkForgot', array('middleware' => 'cors', 'uses' => 'Api\laundryController@sendLinkForgot'));
Route::post('laundry/set-new-password', array('middleware' => 'cors', 'uses' => 'Api\laundryController@setNewPassword'));

//For Order
Route::post('order/show-items', array('middleware' => 'cors', 'uses' => 'Api\OrderController@itemsWithPrice'));
Route::post('order/create-order', array('middleware' => 'cors', 'uses' => 'Api\OrderController@createOrder'));
Route::post('order/view-order', array('middleware' => 'cors', 'uses' => 'Api\OrderController@viewOrder'));
Route::post('order/cancel-order', array('middleware' => 'cors', 'uses' => 'Api\OrderController@cancelOrder'));
Route::post('order/order-items', array('middleware' => 'cors', 'uses' => 'Api\OrderController@viewOrderItems'));
