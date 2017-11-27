<?php

namespace App\Http\Controllers\Admin;

use App\Model\Images;
use App\Model\ImagesFolder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\HtmlString;

class ImagesController extends BaseController
{
    /**
     * @var ImagesFolder
     */
    protected $folder;
    protected $images;

    public function __construct()
    {
        $this->folder=new ImagesFolder();
        $this->images=neW Images();
    }

    /**
     * 
     * @return mixed
     */
    public function getFolderTree()
    {
        $data=$this->folder->getAllList();
        $count=$this->images->count();
        
        return $this->msg(1,"",[
            'tree'=>$data,
            'total'=>$count
        ]);
    }

    public function getImgList(Request $request)
    {
        $params=$request->all();
        $where=array();
        if(isset($params['id'])){
            $id=intValue($params['id'])?$params['id']:0;
            $where[]=['folder_id',"=",$id];
        }
        if(isset($params['file_name'])){
            $where[]=['name',"like",'%'.$params['file_name'].'%'];
        }
        $data=$this->images->getImagesListByFolderId($where);
        $arr=array();
        $arr=$data->toArray();
        return $this->msg(1,"",transImagePath($arr['data']),"",$data->toHtml());
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
            $folder->save();
            return $this->msg(1,"");
        }
        return $this->msg(0,"");
    }

    public function delFolder(Request $request)
    {
        $id=$request->input("id",0);
        if($id){
            $this->folder->destroy($id);
            $this->images->where("folder_id","=",$id)->delete();
            return $this->msg(1,"删除成功");
        }else{
            return $this->msg(0,"删除失败");
        }
    }

    public function moveImg(Request $request){
        $file_id=$request->input("file_id");
        $folder_id=$request->input("folder_id");
        $res=$this->images->whereIn("id",$file_id)->update(['folder_id'=>$folder_id]);
        if($res)
            return $this->msg(1,"移动成功");
        else
            return $this->msg(0,"移动失败");
    }

    public function getAllFolderTree(Request $request)
    {
        $folder_id=$request->input("id",0);
        $data=array();
        $tree=array();
        $data['total']=$this->images->count();
        $data['nocat_total']=$this->images->where("folder_id",0)->count();
        if($folder_id >= 0){
            $tree=$this->folder->getInfo($folder_id);
        }
        $data['tree'][]=$tree;
        return $this->msg(1,"",$data);
    }
}
