<?php

Route::group(['namespace' => 'Driver'], function () {

//For Admin Panel dashboard
Route::get('dashboard', 'DriverController@dashboard')->name('dashboard');

});

