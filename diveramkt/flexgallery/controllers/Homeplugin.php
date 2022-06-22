<?php namespace Diveramkt\Flexgallery\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Backend\Classes\NavigationManager;
use Redirect;

class Homeplugin extends Controller
{
	public $implement = [
		// 'Backend\Behaviors\ListController',
	];

	// public $listConfig = 'config_list.yaml';

	public function __construct()
	{
		parent::__construct();

		$this->addCss('/modules/system/assets/css/settings/settings.css', 'core');
		$this->addCss('/modules/backend/assets/css/october.css');
	}

	public function index(){
		
		BackendMenu::setContext('Diveramkt.Flexgallery', 'main-menu-flexgallery');
		// $this->vars['items']=BackendMenu::listSideMenuItems();
		$items=BackendMenu::listSideMenuItems();
		$redirect = array_shift($items);
		if(isset($redirect->url)) return Redirect::to($redirect->url);
	}
}
