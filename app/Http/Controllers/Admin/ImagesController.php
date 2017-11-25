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
        
        return $this->msg(1,"",[
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
        $arr=array();
        $arr=$data->toArray();
//        p($data->links());
        return $this->msg(1,"",transImagePath($arr['data']),"",$data->links());
    }

    public function addImg(Request $request)
    {
        $file = $request->file("Filedata");
        $file_path=$file->store(date('ym'),'public');
        $arr=array(
            "folder_id"=>$request->input("cate_id",0),
            "file"=>$file_path,
            "name"=>$request->input("Filename","default.jpg")
        );

        $obj=$this->images->create($arr);
        return $this->msg(1,"",[
            'file_id'=>$obj->id,
            'file_path'=>$file_path,
        ]);
    }

    public function delImg(Request $request)
    {
        $file_id=$request->input("file_id");
        if($this->images->destroy($file_id)){
            return $this->msg(1,"删除成功");
        }else{
            return $this->msg(0,"删除失败");
        }
    }

    public function renameImg(Request $request)
    {
        $img=$this->images->find($request->input("file_id",0));
        if($img){
            $img->name=$request->input("file_name","default.jpg");
            $img->save();
            return $this->msg(1,"更改成功");
        }
        return $this->msg(0,"更改失败");
    }

    public function addFolder()
    {
        $res=$this->folder->create([
            'name'=>'未命名文件夹'
        ]);
        if($res->id){
            return $this->msg(1,"更改成功",['id'=>$res->id]);
        }else{
            return $this->msg(0,"更改失败");
        }
    }

    public function renameFolder(Request $request){
        $folder=$this->folder->find($request->input("folder_id"));
        if($folder){
            $folder->name=$request->input("name","未命名文件夹");
            return $this->msg(1,"");
        }
        return $this->msg(0,"");
    }
}
