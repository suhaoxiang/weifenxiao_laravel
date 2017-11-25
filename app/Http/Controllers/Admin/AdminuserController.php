<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminUserRequest;
use App\Model\AdminUser;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;

class AdminuserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminUser $user)
    {
        $data=$user->orderByDesc("id")->paginate(10);
        return view('admin.adminuser.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleList=Role::all();
        return view('admin.adminuser.create',['roleList'=>$roleList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request,AdminUser $user)
    {
        $user->create([
            "name"=>$request->input("name"),
            "username"=>$request->input("username"),
            "password"=>bcrypt($request->input("password"))
        ]);
        $user->updateRole($request->input('role_id'));
        return redirect("/adminuser");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $user,$id)
    {
        $data=$user->findOrFail($id);
        $roles=[];
        foreach ($data->roles as $item){
            $roles[]=$item->id;
        }
        $roleList=Role::all();
        return view('admin.adminuser.edit',['data'=>$data,'roleList'=>$roleList,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, $id)
    {
        $user=AdminUser::findOrFail($id);
        $user->update([
            "name"=>$request->input("name"),
            "username"=>$request->input("username"),
            "password"=>bcrypt($request->input("password"))
        ]);
        $user->updateRole($request->input('role_id'));
        return redirect('/adminuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=AdminUser::find($id);
        if($user != null){
            foreach ($user->roles as $item){
                $user->roles()->detach($item);
            }
            $user->delete();
            return $this->msg(1,"删除成功");
        }
        return $this->msg(0,"删除失败");

    }
}
