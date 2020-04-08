<?php namespace Diveramkt\Flexgallery\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class OneBanner extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'manage_banners' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery', 'side-menu-onebanner');
    }

    public function reorderExtendQuery($query)
    {
        $veri=explode('reorder/',$_SERVER['REDIRECT_URL']);
        if(isset($veri[1]) && is_numeric($veri[1])) return $query->where('banner_id','=',$veri[1]);
    }

    public function listExtendQuery($query)
    {
        $query->orderBy('sort_order', 'desc');
        return $query;
    }
}
