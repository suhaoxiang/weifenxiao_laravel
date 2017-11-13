<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $data=$role::paginate(10);
        return view('admin.role.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Permission $permission)
    {
        $data=$permission->where("pid","=","0")->get();
        return view('admin.role.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request,Role $role)
    {
        $role->name=$request->input('name');
        $role->display_name=$request->input('display_name');
        $role->save();

        $privList=$request->input("priv");
        if(is_array($privList))
            $role->permission()->sync($privList);

        return redirect('/role');
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
    public function edit($id)
    {
        $data=Role::findOrFail($id);
        $permissionList=Permission::where("pid","=","0")->get();
        return view('admin.role.edit',['data'=>$data,'permissionList'=>$permissionList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
