<?php

Route::group(['namespace'=>'Admin'],function(){
    //登录页面
    Route::get('login','LoginController@index')->name('login');

});

