<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class AdminUser extends User
{
    use EntrustUserTrait;
    protected $table='admin_users';

    protected $guarded = ['geetest_challenge', 'geetest_validate', 'geetest_seccode'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','password','name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role','role_user','user_id','role_id');
    }

    public function updateRole($role_id){
        $this->roles()->detach();
        $roles=Role::where("id","=",$role_id)->get();
        foreach ($roles as $role){
            return $this->roles()->save($role);
        }
        return true;
    }
}
