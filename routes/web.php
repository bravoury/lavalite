<?php

// Resource routes  for seller
Route::group(['prefix' => set_route_guard('web').'/seller'], function () {
    Route::resource('seller', 'SellerResourceController');
});

// Public  routes for seller
Route::get('seller/popular/{period?}', 'SellerPublicController@popular');
Route::get('sellers/', 'SellerPublicController@index');
Route::get('sellers/{slug?}', 'SellerPublicController@show');

