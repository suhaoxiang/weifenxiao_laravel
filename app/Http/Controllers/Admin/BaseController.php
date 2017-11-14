<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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

    /**
     * ajax请求返回json数据
     * @param $data  返回的具体内容
     * @param int $type 1表示成功，0表示失败
     * @param string $url 跳转地址
     * @return mixed
     */
    public function msg($data=[], $type=1, $url=''){
        return response()->json([
            "data"=>$data,
            "status"=>$type,
            "url"=>$url
        ]);
    }
}
