<?php namespace Diveramkt\Flexgallery\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Str;
use Diveramkt\Flexgallery\Models\Banner;
use Redirect;
use Backend;
use Request;

class OneBanner extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

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
        BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery', 'side-menu-onebanner');

        if(strpos('["'.Request::url('/').'"]','diveramkt/flexgallery/onebanner/reorder')){
            $get=$this->getBannerCurrent();
            if(!isset($get->id)) return;
        // $slug=Str::slug($get->title);
            $this->requiredPermissions[]='manage_banners_page_'.$get->id;
            BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery', 'side-menu-page_'.$get->id);
            $this->pageTitle = 'Página: '.$get->title;
        }
    }

    public function reorderExtendQuery($query)
    {
        $veri=explode('reorder/',$_SERVER['REDIRECT_URL']);
        if(isset($veri[1]) && is_numeric($veri[1])) $query->where('banner_id','=',$veri[1]);
        $query->orderBy('sort_order', 'desc')->where('enabled',1);
        return $query;
    }

    public function listExtendQuery($query)
    {
        // ->where('id',1)
        $query->orderBy('sort_order', 'desc');
        return $query;
    }
}
