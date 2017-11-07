<?php

Route::group(['namespace'=>'Admin'],function(){
    //登录页面
    Route::get('login','LoginController@index')->name('login');
    //处理登录页面
    Route::post('loginHandler','LoginController@loginHandler');
    //退出登录
    Route::get('logout','LoginController@logout');
    //后台首页
    Route::get('/','ShopController@index');
    //商品
    Route::resource('goods','GoodsController');
});

