<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected $params;

    /**
     * BaseController constructor.
     * @param $params
     */
    public function __construct(Request $request)
    {
        $this->params = $request->all();
    }


}
