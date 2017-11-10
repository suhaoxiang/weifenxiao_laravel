<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends BaseController
{
    //店铺设置
    public function shopInfo()
    {

        return view('admin.system.shopinfo');
    }
}
