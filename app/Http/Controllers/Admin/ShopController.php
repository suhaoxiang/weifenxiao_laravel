<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ShopController extends BaseController
{
    /**
     * ShopController constructor.
     */
    public function __construct()
    {
        if(Auth::guard("admin")->check()){
            return true;
        }else{
            return redirect('/login');
        }
    }

    public function index(){

        return view('admin.shop.index');
    }
}
