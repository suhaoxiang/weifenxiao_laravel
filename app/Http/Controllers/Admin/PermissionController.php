<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use App\Model\Permission;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        $data=$permission::where("pid","=",0)->paginate(20);
        return view('admin.permission.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid=0)
    {
        return view("admin.permission.create",['pid'=>$pid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request,Permission $permission)
    {
        $permission::create([
            'pid'=>$request->input('pid'),
            'name'=>$request->input('name'),
            'display_name'=>$request->input('display_name'),
            'decription'=>$request->input('decription'),
        ]);

        return redirect('/permission');
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
        $data=Permission::findOrFail($id);
        return view('admin.permission.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission=Permission::find($id);
        $permission->update([
            'pid'=>$request->input('pid'),
            'name'=>$request->input('name'),
            'display_name'=>$request->input('display_name'),
            'description'=>$request->input('description'),
            'icon'=>$request->input('icon'),
        ]);
        return redirect('/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=Permission::find($id);
        if($permission != null){
            //删除子权限
            $privList=$permission->getPermissionList($id);
            if($privList != null){
                foreach ($privList as $priv){
                    foreach ($priv->roles as $item){
                        $priv->roles()->detach($item);
                    }
                    $priv->delete();
                }
            }

            foreach ($permission->roles as $item){
                $permission->roles()->detach($item);
            }

            $permission->delete();

            return $this->msg("删除成功");
        }
        return $this->msg("删除失败",0);
    }
}
