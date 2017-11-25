<?php

if(!function_exists('p')){
    /**
     * 调试函数
     * @param $arr
     */
    function p($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

if(!function_exists('transImagePath')) {

    /**
     * 将图片地址转换成带有链接的地址
     * @param $data
     * @return mixed
     */
    function transImagePath($data)
    {
        foreach ($data as $key => $item) {
            $data[$key]['file'] = \Illuminate\Support\Facades\Storage::url($item['file']);
        }
        return $data;
    }
}