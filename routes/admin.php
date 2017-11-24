<?php

Route::group(['namespace'=>'Admin',"as"=>"admin.","middleware"=>['menu']],function(){
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
    //系统设置
    Route::get('/system',['uses'=>'SystemController@shopInfo','as'=>'system']);
    //权限管理
    Route::get('permission/{pid}/create','PermissionController@create');
    Route::resource('permission','PermissionController');
    //用户管理
    Route::resource('adminuser','AdminuserController');
    //角色管理
    Route::resource('role','RoleController');

    //图片管理器
    Route::post('images/getFolderTree','ImagesController@getFolderTree');
    Route::post('images/getImgList','ImagesController@getImgList');
    Route::post('images/addImg','ImagesController@addImg');
});

