<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagesFolder extends Model
{
    protected $table='images_folder';
    protected $fillable=["name"];

    public function getAllList()
    {
        $images=new Images();
        //默认未分类
        $default=array("id"=>0,"name"=>"未分类","picNum"=>$images->where("folder_id",0)->count());

        $data=$this->orderByDesc("id")->get()->toArray();
        foreach ($data as $key=>$item){
            $data[$key]['picNum']=$images->where("folder_id",$item['id'])->count();
        }

        $data[]=$default;
        return array_reverse($data);

    }

    public function getAllCount()
    {
        return $this->count();
    }

    public function getInfo($id){
        $data=$this->first($id);
        $images=new Images();
        if($data){
            $data=$data->toArray();
            $data['picNum']=$images->where("folder_id",$id)->count();
        }else{
            $data=array();
        }
        return $data;
    }
}
