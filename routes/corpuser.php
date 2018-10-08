<?php

Route::group(['namespace' => 'CorpUser'], function () {



Route::get('booking', 'UserController@index')->name('booking');

Route::get('myprofile', 'UserController@myprofile')->name('myprofile');	

Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

Route::get('price_calculator', 'UserController@price_calculator')->name('price_calculator');

Route::get('order_history', 'UserController@order_history')->name('order_history');

Route::get('track/{orderid}', 'UserController@track')->name('track');

Route::get('calender', 'UserController@calender')->name('calender');

Route::get('offer', 'UserController@offer')->name('offer');

Route::get('faq', 'UserController@faq')->name('faq');

Route::get('setting', 'UserController@setting')->name('setting');

Route::get('coupoan', 'UserController@coupoan')->name('coupoan');

Route::get('refer', 'UserController@refer')->name('refer');

Route::get('help', 'UserController@help')->name('help');

Route::get('add_item/{id}', 'UserController@add_item')->name('add_item');

Route::get('schedule', 'UserController@schedule')->name('schedule');

Route::post('add_schedule', 'UserController@add_schedule')->name('add_schedule');

Route::get('review_order', 'UserController@review_order')->name('review_order');

Route::get('payments', 'UserController@payment')->name('payments');

Route::get('address', 'UserController@address')->name('address');

Route::post('save_address', 'UserController@save_address')->name('save_address');

Route::get('delete_address/{uniqueId}', 'UserController@delete_address')->name('delete_address');

Route::get('edit_address/{uniqueId}', 'UserController@edit_address')->name('edit_address');

Route::post('update_password', 'UserController@update_password')->name('update_password');

Route::post('update_phone', 'UserController@update_phone')->name('update_phone');

Route::get('facebook', 'UserController@facebook')->name('facebook');

Route::get('twitter', 'UserController@twitter')->name('twitter');

Route::get('gplus/{refer_code}', 'UserController@gplus')->name('gplus');

Route::get('linkedin', 'UserController@linkedin')->name('linkedin');

//Payment controller//

Route::post('payment', 'PaymentController@payment_gateway')->name('payment');

Route::post('payment_completed', 'PaymentController@payment_completed')->name('payment_completed');

Route::post('voucher_payment', 'UserController@voucher_payment')->name('voucher_payment');

Route::post('remove_voucher', 'UserController@remove_voucher')->name('remove_voucher');

//Order Controller//
Route::get('favorite/{id}', 'OrderController@favorite')->name('favorite');

Route::get('unfavorite/{id}', 'OrderController@unfavorite')->name('unfavorite');

Route::post('update_item','UserController@update_item')->name('update_item');

Route::post('updateItem','UserController@updateItem')->name('updateItem');

Route::post('saveItem','UserController@saveItem')->name('saveItem');

Route::get('save_order/{id}', 'OrderController@save_order')->name('save_order');

Route::get('edit_item/{id}', 'OrderController@edit_item')->name('edit_item');

Route::post('update_service', 'OrderController@update_service')->name('update_service');

Route::post('cancel_order', 'OrderController@cancel_order')->name('cancel_order');

Route::post('update_repeatorder', 'OrderController@update_repeatorder')->name('update_repeatorder');

Route::get('repeat_order/{id}', 'OrderController@repeat_order')->name('repeat_order');

Route::get('feedback', 'OrderController@feedback')->name('feedback');

Route::post('update_feedback', 'OrderController@update_feedback')->name('update_feedback');

Route::get('complaint', 'OrderController@complaint')->name('complaint');

Route::post('update_complaint', 'OrderController@update_complaint')->name('update_complaint');

Route::get('order_history_detail/{id}', 'OrderController@order_history_detail')->name('order_history_detail');

Route::get('/track1/location1', 'UserController@getlocation');

Route::get('returnurl', 'PaymentController@returnurl')->name('returnurl');

});

