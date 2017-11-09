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
        'username','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
