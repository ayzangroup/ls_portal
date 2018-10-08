<?php

Route::group(['namespace' => 'Laundry'], function () {

//For Admin Panel dashboard
Route::get('dashboard', 'LaundryController@dashboard')->name('dashboard');

});

