<?php

namespace App\Http\Controllers\Admin;

use App\Model\Images;
use App\Model\ImagesFolder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends BaseController
{
    protected $folder;
    protected $images;

    public function __construct()
    {
        $this->folder=new ImagesFolder();
        $this->images=neW Images();
    }

    public function getFolderTree()
    {
        $data=$this->folder->getAllList();
        $count=$this->folder->getAllCount();

        return $this->msg([
            'tree'=>$data,
            'total'=>$count
        ]);
    }

    public function getImgList(Request $request)
    {
        $params=$request->all();
        if(isset($params['id'])){
            $id=intValue($params['id'])?$params['id']:0;
            $data=$this->images->getImagesListByFolderId($id);
        }else{
            $data=$this->images->getImagesListByFolderId();
        }

        return $this->msg($data->toArray(),1,"","");
    }

    public function addImg(Request $request)
    {
        $file = $request->file("Filedata");
        $file_path=$file->store(date('ymd'));
        $arr=array(
            "folder_id"=>$request->input("cate_id",0),
            "file"=>$file_path,
            "name"=>$request->input("Filename","default.jpg")
        );

        $obj=$this->images->create($arr);
        return $this->msg([
            'file_id'=>$obj->id,
            'file_path'=>$file_path,
        ]);
    }

}
