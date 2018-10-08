<?php

	

Route::group(['namespace' => 'Admin'], function () {



//For Admin Panel dashboard

Route::get('dashboard', 'AdminUserController@dashboard')->name('dashboard');

Route::get('add_register','UserController@register_form')->name('add_register');


//CMS Controller Work For add data on Website

//Term And Condition data

Route::get('term_and_condition', 'CMSController@term_and_condition')->name('term_and_condition');

Route::get('add_term_and_condition', 'CMSController@add_term_and_condition')->name('add_term_and_condition');

Route::post('submit_term_and_condition', 'CMSController@submit_term_and_condition')->name('submit_term_and_condition');


//Privacy data

Route::get('view_privacy', 'CMSController@view_privacy')->name('view_privacy');

Route::get('add_privacy', 'CMSController@add_privacy')->name('add_privacy');

Route::post('submit_privacy', 'CMSController@submit_privacy')->name('submit_privacy');





//Banner data

Route::get('view_banner', 'CMSController@view_banner')->name('view_banner');

Route::get('add_banner', 'CMSController@add_banner')->name('add_banner');

Route::post('submit_banner', 'CMSController@submit_banner')->name('submit_banner');

Route::get('edit_banner/{id}', 'CMSController@edit_banner')->name('edit_banner');

Route::post('delete_banner', 'CMSController@delete_banner')->name('delete_banner');

Route::post('update_banner', 'CMSController@update_banner')->name('update_banner');





//Faq Title add

Route::get('faqtitle', 'CMSController@faqtitle')->name('faqtitle');

Route::post('submit_faqtitle', 'CMSController@submit_faqtitle')->name('submit_faqtitle');

Route::post('edit_faqtitle', 'CMSController@edit_faqtitle')->name('edit_faqtitle');

Route::post('delete_faqtitle', 'CMSController@delete_faqtitle')->name('delete_faqtitle');





//Faq Data Add

Route::get('view_faq', 'CMSController@view_faq')->name('view_faq');

Route::get('add_faq', 'CMSController@add_faq')->name('add_faq');

Route::post('submit_faq', 'CMSController@submit_faq')->name('submit_faq');

Route::get('edit_faq/{id}', 'CMSController@edit_faq')->name('edit_faq');

Route::post('update_faq', 'CMSController@update_faq')->name('update_faq');

Route::post('delete_faq', 'CMSController@delete_faq')->name('delete_faq');





//Serve Data

Route::get('view_serve', 'CMSController@view_serve')->name('view_serve');

Route::get('add_serve', 'CMSController@add_serve')->name('add_serve');

Route::post('submit_serve', 'CMSController@submit_serve')->name('submit_serve');

Route::post('delete_serve', 'CMSController@delete_serve')->name('delete_serve');

Route::get('edit_serve/{id}', 'CMSController@edit_serve')->name('edit_serve');

Route::post('update_serve', 'CMSController@update_serve')->name('update_serve');



//Process Data

Route::get('view_process', 'CMSController@view_process')->name('view_process');

Route::get('add_process', 'CMSController@add_process')->name('add_process');

Route::post('submit_process', 'CMSController@submit_process')->name('submit_process');

Route::post('delete_process', 'CMSController@delete_process')->name('delete_process');

Route::get('edit_process/{id}', 'CMSController@edit_process')->name('edit_process');

Route::post('update_process', 'CMSController@update_process')->name('update_process');



//WhyUs Data

Route::get('view_whyus', 'CMSController@view_whyus')->name('view_whyus');

Route::get('add_whyus', 'CMSController@add_whyus')->name('add_whyus');

Route::post('submit_whyus', 'CMSController@submit_whyus')->name('submit_whyus');

Route::post('delete_whyus', 'CMSController@delete_whyus')->name('delete_whyus');

Route::get('edit_whyus/{id}', 'CMSController@edit_whyus')->name('edit_whyus');

Route::post('update_whyus', 'CMSController@update_whyus')->name('update_whyus');





//Contact Us Data

Route::get('view_contactus', 'CMSController@view_contactus')->name('view_contactus');

Route::get('add_contactus', 'CMSController@add_contactus')->name('add_contactus');

Route::post('submit_contactus', 'CMSController@submit_contactus')->name('submit_contactus');

Route::post('delete_contactus', 'CMSController@delete_contactus')->name('delete_contactus');

Route::get('edit_contactus/{id}', 'CMSController@edit_contactus')->name('edit_contactus');

Route::post('update_contactus', 'CMSController@update_contactus')->name('update_contactus');



//Blog Data

Route::get('view_blog', 'CMSController@view_blog')->name('view_blog');

Route::get('add_blog', 'CMSController@add_blog')->name('add_blog');

Route::post('submit_blog', 'CMSController@submit_blog')->name('submit_blog');



//services data
Route::get('view_services', 'ServiceController@view_services')->name('view_services');

Route::get('add_services', 'ServiceController@add_services')->name('add_services');

Route::post('submit_services', 'ServiceController@submit_services')->name('submit_services');

Route::get('edit_services/{id}', 'ServiceController@edit_services')->name('edit_services');

Route::post('delete_services', 'ServiceController@delete_services')->name('delete_services');

Route::post('update_services', 'ServiceController@update_services')->name('update_services');



//categories data

Route::get('view_category', 'CategoryController@view_category')->name('view_category');

Route::post('submit_category', 'CategoryController@submit_category')->name('submit_category');

Route::post('delete_category', 'CategoryController@delete_category')->name('delete_category');

Route::post('update_category', 'CategoryController@update_category')->name('update_category');



//packaging data

Route::get('view_packaging', 'PackagingController@view_packaging')->name('view_packaging');

Route::post('submit_packaging', 'PackagingController@submit_packaging')->name('submit_packaging');

Route::post('delete_packaging', 'PackagingController@delete_packaging')->name('delete_packaging');

Route::post('update_packaging', 'PackagingController@update_packaging')->name('update_packaging');





//Item data

Route::get('view_items', 'ItemController@view_items')->name('view_items');

Route::get('add_items', 'ItemController@add_items')->name('add_items');

Route::post('submit_items', 'ItemController@submit_items')->name('submit_items');

Route::get('edit_items/{id}', 'ItemController@edit_items')->name('edit_items');

Route::post('delete_items', 'ItemController@delete_items')->name('delete_items');

Route::post('update_items', 'ItemController@update_items')->name('update_items');





//Offer data

Route::get('view_offers', 'OfferController@view_offers')->name('view_offers');

Route::get('add_offers', 'OfferController@add_offers')->name('add_offers');

Route::post('submit_offers', 'OfferController@submit_offers')->name('submit_offers');

Route::get('edit_offers/{id}', 'OfferController@edit_offers')->name('edit_offers');

Route::post('delete_offers', 'OfferController@delete_offers')->name('delete_offers');

Route::post('update_offers', 'OfferController@update_offers')->name('update_offers');

Route::post('publish_offers', 'OfferController@publish_offers')->name('publish_offers');

Route::post('unpublish_offers', 'OfferController@unpublish_offers')->name('unpublish_offers');


//Coupoan data

Route::get('view_coupoan', 'CoupoanController@view_coupoan')->name('view_coupoan');

Route::get('add_coupoan', 'CoupoanController@add_coupoan')->name('add_coupoan');

Route::post('submit_coupoan', 'CoupoanController@submit_coupoan')->name('submit_coupoan');

Route::get('edit_coupoan/{id}', 'CoupoanController@edit_coupoan')->name('edit_coupoan');

Route::post('delete_coupoan', 'CoupoanController@delete_coupoan')->name('delete_coupoan');

Route::post('update_coupoan', 'CoupoanController@update_coupoan')->name('update_coupoan');

Route::post('publish_coupoan', 'CoupoanController@publish_coupoan')->name('publish_coupoan');

Route::post('unpublish_coupoan', 'CoupoanController@unpublish_coupoan')->name('unpublish_coupoan');



//price data

Route::get('view_price', 'PriceController@view_price')->name('view_price');

Route::get('add_price', 'PriceController@add_price')->name('add_price');

Route::post('submit_price', 'PriceController@submit_price')->name('submit_price');

Route::get('edit_price/{id}', 'PriceController@edit_price')->name('edit_price');

Route::post('delete_price', 'PriceController@delete_price')->name('delete_price');

Route::post('update_price', 'PriceController@update_price')->name('update_price');



//UserManagement Data

Route::get('view_user', 'UserController@view_user')->name('view_user');

Route::get('view_corpuser', 'UserController@view_corpuser')->name('view_corpuser');

Route::get('view_adminuser', 'UserController@view_adminuser')->name('view_adminuser');

Route::post('delete_admin', 'UserController@delete_admin')->name('delete_admin');

Route::post('edit_admin', 'UserController@edit_admin')->name('edit_admin');



//Address ManageMent Data

Route::get('view_useraddress', 'AddressController@view_useraddress')->name('view_useraddress');

Route::get('view_corpuseraddress', 'AddressController@view_corpuseraddress')->name('view_corpuseraddress');



//Driver Management

Route::get('view_driver', 'UserController@view_driver')->name('view_driver');

Route::get('driver_profile/{id}', 'UserController@driver_profile')->name('driver_profile');

Route::post('approve_driverdocument','UserController@approve_driverdocument')->name('approve_driverdocument');

Route::post('approve_driver', 'UserController@approve_driver')->name('approve_driver');



//LaundryMan Management

Route::get('view_laundry', 'UserController@view_laundry')->name('view_laundry');

Route::get('laundry_profile/{id}', 'UserController@laundry_profile')->name('laundry_profile');

Route::post('approve_document','UserController@approve_document')->name('approve_document');

Route::post('approve_laundry', 'UserController@approve_laundry')->name('approve_laundry');

//view Request

Route::get('view_request', 'UserController@view_request')->name('view_request');

Route::get('view_messages', 'UserController@view_messages')->name('view_messages');

Route::get('view_feedback', 'GeneralController@view_feedback')->name('view_feedback');

Route::get('view_complaint', 'GeneralController@view_complaint')->name('view_complaint');

Route::get('refercode_detail', 'GeneralController@refercode_detail')->name('refercode_detail');

Route::get('edit_refercodedetail/{id}', 'GeneralController@edit_refercodedetail')->name('edit_refercodedetail');

Route::post('unpublish_refercodedetail', 'GeneralController@unpublish_refercodedetail')->name('unpublish_refercodedetail');

Route::post('publish_refercodedetail', 'GeneralController@publish_refercodedetail')->name('publish_refercodedetail');

Route::post('update_refercode_detail', 'GeneralController@update_refercode_detail')->name('update_refercode_detail');


//Notification

Route::get('send_notification', 'GeneralController@send_notification')->name('send_notification');

Route::post('send_notification/user', 'GeneralController@send_notification_user_submit')->name('send_notification_user_submit');

Route::post('send_notification/corpuser', 'GeneralController@send_notification_corpuser_submit')->name('send_notification_corpuser_submit');

//Send Sms

Route::get('send_sms', 'GeneralController@send_sms')->name('send_sms');

Route::post('send_sms/user', 'GeneralController@send_sms_user_submit')->name('send_sms_user_submit');

Route::post('send_sms/corpuser', 'GeneralController@send_sms_corpuser_submit')->name('send_sms_corpuser_submit');


//Order History

Route::get('order_history', 'OrderController@order_history')->name('order_history');

Route::get('place_order', 'OrderController@place_order')->name('place_order');

Route::get('cancel_order', 'OrderController@cancel_order')->name('cancel_order');

Route::get('order_details/{id}', 'OrderController@order_details')->name('order_details');





});







