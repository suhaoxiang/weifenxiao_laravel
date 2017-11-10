<?php

namespace Suhaoxiang\Adminmenu;

use Illuminate\Support\ServiceProvider;
use Suhaoxiang\Adminmenu\Controllers\Adminmenu;

class AdminmenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //路由文件
        $this->loadRoutesFrom(__DIR__.'/routes/adminmenu.php');
        //配置文件
        $this->publishes([
            __DIR__.'/config/menu.php'=>config_path('menu.php'),
            __DIR__.'/Views/siderbar.blade.php'=>resource_path('views/vendor/menu/layout/siderbar.blade.php'),
            __DIR__.'/Views/menu.blade.php'=>resource_path('views/vendor/menu/layout/menu.blade.php'),
            __DIR__.'/Views/main.blade.php'=>resource_path('views/vendor/menu/main.blade.php'),
            __DIR__.'/assets/css/menu.css'=>public_path('css/menu.css'),
            __DIR__.'/assets/js/require.js'=>public_path('lib/require.js'),
            __DIR__.'/assets/js/main.js'=>public_path('lib/main.js'),

        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('adminmenu',function(){
            return new Adminmenu();
        });
    }
}
