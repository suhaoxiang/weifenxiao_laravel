<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'folder_id','name','file'
    ];

    public function getImagesListByFolderId($folder_id=null){
        if(is_null($folder_id)){
            //表示获取所有图
            return $this->paginate(28);
        }else{
            //获取某个文件夹下的图片
            return $this->where("folder_id","=",$folder_id)->paginate(28);
        }
    }


}
