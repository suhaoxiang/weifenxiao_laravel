<?php
namespace Suhaoxiang\Adminmenu\Facades;

use Illuminate\Support\Facades\Facade;

class Adminmenu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adminmenu';
    }
}