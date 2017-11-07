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