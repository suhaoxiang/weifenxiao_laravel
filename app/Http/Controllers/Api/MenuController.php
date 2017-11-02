<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends BaseController
{
    public function getTopMenu(){
        $data=[
            ['name'=>'首页','url'=>route('index.page')],
            ['name'=>'店铺','url'=>route('shop.page')],
            ['name'=>'商品','url'=>route('goods.page')],
            ['name'=>'订单','url'=>route('order.page')],
            ['name'=>'会员','url'=>route('user.page')],
        ];
        return returnArray($data);
    }
}
