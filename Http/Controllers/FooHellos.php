<?php

namespace Modules\FooHello\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Routing\Controller;
use Modules\Backend\Classes\Controller;
use BackendMenu;
use Modules\System\Classes\SideNavManager;
class FooHellos extends Controller
{
    public $implement = [
        'Modules.Backend.Behaviors.ListController',
        'Modules.Backend.Behaviors.FormController',
        \Modules\Backend\Behaviors\RelationController::class,

    ];
    public $relationConfig = 'config_relation.yaml';
    public $listConfig = [
        'list'=>'config_list.yaml',
    ];
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Modules.FooHello', 'foohello');//选中顶部
        SideNavManager::setContext('Modules.FooHello', 'foohellos');//选中侧边拦

    }
    public function index()
    {
        $this->asExtension('ListController')->index();
        return view('foohello::foohellos.index',['widget'=>$this->widget]);

    }
    public function create($context='')
    {
        $this->asExtension('FormController')->create($context);
        return view('foohello::foohellos.create',['widget'=>$this->widget]);

    }
    public function update($id,$context='')
    {
        $this->asExtension('FormController')->update($id,$context);
        return view('foohello::foohellos.update', ['widget'=>$this->widget]);

    }

    public function onDelete($component,$params)
    {
        $checked = \Arr::get($params,'checked');

        foreach($checked as $checkedId)
        {
            ModelsFoo::find($checkedId)->delete();
        }
        $component->notification()->info(
            $title = 'Info',
            $description = '删除成功'
        );
        $component->refresh();


    }

    public function formExtendFields($formWidget,$fields)
    {

        $fieldNames =  array_keys($fields);
        if(($editFields = post('edit_fields'))&&is_array($editFields)&&!empty($editFields)){
            foreach($fieldNames as $fieldName){
                if(!in_array($fieldName,$editFields)){
                    $formWidget->removeField($fieldName);
                }
            }
        }


    }
}
