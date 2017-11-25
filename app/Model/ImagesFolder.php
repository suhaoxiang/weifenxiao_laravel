<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagesFolder extends Model
{
    protected $table='images_folder';
    protected $fillable=["name"];

    public function getAllList()
    {
        //默认未分类
        $default=array("id"=>0,"name"=>"未分类","picNum"=>1);

        $data=$this->orderByDesc("id")->get()->toArray();
        $data[]=$default;
        return array_reverse($data);
//        return $data;
    }

    public function getAllCount()
    {
        return $this->count();
    }
}
