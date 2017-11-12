<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Role;
use App\Model\Permission;
use Illuminate\Support\Facades\Cache;
use Suhaoxiang\Adminmenu\Facades\Adminmenu;
use Suhaoxiang\Notice\Notice;


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

    public function index()
    {

        return view('admin.shop.index');
    }
}
