<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends BaseController
{

    /**
     * LoginController constructor.
     * @param string $redirectTo
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function index()
    {

        return view('admin.login.index');
    }

    public function loginHandler(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password'=>$request->input("password")
        ]);
        if($status){
            return redirect('/');
        }else{
            return back()->with("messages","账号或密码错误");
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
