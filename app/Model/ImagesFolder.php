<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagesFolder extends Model
{
    protected $table='images_folder';

    public function getAllList()
    {
        //默认未分类
        $default=array("id"=>0,"name"=>"未分类","picNum"=>1);

        $data=$this->get()->toArray();
        $data[]=$default;

        return $data;
    }

    public function getAllCount()
    {
        return $this->count();
    }
}
