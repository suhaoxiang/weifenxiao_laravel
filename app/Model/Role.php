<?php

namespace App\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable=['name','display_name'];

    public function permission(){
        return $this->belongsToMany('App\Model\Permission','permission_role','role_id','permission_id');
    }


}
