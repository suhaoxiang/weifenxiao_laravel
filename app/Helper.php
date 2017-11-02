<?php

if(!function_exists('p')){
    function p($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

if(!function_exists('returnArray')){
    function returnArray($data){
        if(is_array($data)){
            if(isset($data['error'])){
                return ['code'=>400,'data'=>"","error"=>$data['error']];
            }
        }
        //不是数组
        return ['code'=>200,'data'=>$data];
    }
}