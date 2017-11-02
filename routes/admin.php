<?php

Route::get('/','IndexController@index')->name("index.page");


Route::get('shop/index','ShopController@index')->name("shop.page");
Route::get('item/list','GoodsController@index')->name("goods.page");
Route::get('order/list','OrderController@index')->name("order.page");
Route::get('user/list','UserController@index')->name("user.page");

