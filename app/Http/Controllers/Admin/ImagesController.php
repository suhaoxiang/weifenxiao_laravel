<?php

namespace App\Http\Controllers\Admin;

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
//        $this->images=ne
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
}
