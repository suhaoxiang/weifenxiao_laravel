<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Common extends Model
{

    /**
     * Common constructor.
     */
    public function __construct()
    {
        return Auth::guard('admin')->check();
    }
}
