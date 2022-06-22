<?php namespace Diveramkt\Flexgallery\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class BannersPages extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'manage_banners_pages','manage_banners'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery', 'side-menu-banners_page');
    }
}
