<?php

namespace App\Model;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name','pid','display_name','description','icon'
    ];


    /**
     * 通过父级id获取子级权限列表
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPermissionList($pid){
        return $this->where("pid","=",$pid)->get();
    }
}
