<?php namespace Diveramkt\Flexgallery\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Diveramkt\Flexgallery\Models\Banner;

class Banners extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\RelationController'
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'manage_banners' 
    ];

    public static $getBannerSave=false;
    public static function getBanner(){
        if(!Self::$getBannerSave) Self::$getBannerSave=Banner::get();
        return Self::$getBannerSave;
    }

    public static $getBannerCurrentSave=false;
    public function getBannerCurrent(){
        if(!Self::$getBannerCurrentSave && isset($this->params[0]) && is_numeric($this->params[0])) Self::$getBannerCurrentSave=Banner::where('id',$this->params[0])->first();
        return Self::$getBannerCurrentSave;
    }

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery', 'side-menu-banners');

        $get=$this->getBannerCurrent();
        if(!isset($get->id)) return;
        $this->requiredPermissions[]='manage_banners_page_'.$get->id;
        BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery', 'side-menu-page_'.$get->id);
        $this->pageTitle = 'Página: '.$get->title;
    }


    public function formExtendFields($form)
    {
        if (!$this->user->hasPermission(['manage_banners'])) { 
            $form->removeField('title');
        }
    }

    public function listExtendColumns($list)
    {
        // $list->addColumns([...]);
        // $list->getColumn(...);
        // $list->removeColumn('subtitle');
    }

}
