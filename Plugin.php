<?php namespace Modules\FooHello;

use Backend;
use Modules\System\Classes\PluginBase;


/**
 * Test Plugin Information File
 */
class Plugin extends PluginBase
{


    public function registerPermissions()
    {
        return [
            'backend.foohello.index' => [
                'label' => 'FooHello',
                'tab' => 'FooHello'
            ],
        ];
    }

    //顶部菜单
    public function registerNavigation()
    {

        return [

            'foohello' => [
                'label'       => 'FooHello',
                'url'         => Backend::url('foohello'),
                'icon'        => 'icon-leaf',
                'permissions' => [],
                'order'       => 500,
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [

        ];
    }

    public function register()
    {



    }

    //侧边栏菜单
    public function registerSideNavSettings()
    {

        return [
            'foohello' => [
                'label' => 'FooHello',
                'description' => '',
                'category' => 'FooHello',//侧边栏分组
                'icon' => 'icon-pencil',
                'url'         => Backend::url('foohello'),
                'order' => 500,
                'context'=>['modules.foohello'],//对应模块1的标识符
                'keywords' => 'foohello',
                'permissions' => [],
            ],
            'foohellos' => [
                'label' => 'FooHellos',
                'description' => '',
                'category' => 'FooHello',//侧边栏分组
                'icon' => 'icon-pencil',
                'url'         => Backend::url('foohello/foohellos'),
                'order' => 500,
                'context'=>['modules.foohello'],//对应模块1的标识符
                'keywords' => 'foohellos',
                'permissions' => [],
            ],
        ];
    }

    public function boot()
    {

    }
}
