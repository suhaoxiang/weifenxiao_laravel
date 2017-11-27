<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'folder_id','name','file'
    ];

    public function getImagesListByFolderId($where=array()){
        if(empty($where)){
            //表示获取所有图
            return $this->orderByDesc("id")->paginate(28);
        }else{
            //获取某个文件夹下的图片
            return $this->where($where)->orderByDesc("id")->paginate(28);
        }
    }


}
