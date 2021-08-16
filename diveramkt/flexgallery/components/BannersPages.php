<?php namespace Diveramkt\FlexGallery\Components;

use Cms\Classes\ComponentBase;
// use Cms\Classes\Page;
// use Cms\Classes\Theme;

use Diveramkt\FlexGallery\Models\BannerPages;
// use Diveramkt\FlexGallery\Models\Settings;

class BannersPages extends ComponentBase
{

	public function componentDetails(){
		return [
			'name' => 'Banner das Página interna',
			'description' => 'Internal pages banners'
		];
	}

	public function defineProperties(){
		return [
			// 'banner' => [
			// 	'title' => 'Banner',
			// 	'description' => 'The banners that will be show',
			// 	'type' => 'dropdown',
			// ],
		];
	}

	public function onRun(){
		$this->dados = $this->getBanner();
		if(isset($this->dados['banner'])) $this->banner=$this->dados['banner'];
	}
	protected function getBanner(){
		if(isset($this->page->id) && $this->page->id) return BannerPages::where('page',$this->page->id)->first();
		else return false;
	}

	// protected function getAllBanner(){
	// 	$query = Banner::all();

	// 	foreach ($query as $id=>$c)
	//         $result[$c->id] = $c->title;

	//     return $result;
	// }

	// public function createSettingsFields(){
	// 	$defaultFields = Settings::instance()->toArray();

	// 	if (!empty($defaultFields)) {
 //            foreach ($defaultFields['value'] as $key => $defaultValue) {
 //                $this->settings[$key] = $defaultValue;
 //            }
 //        }

 //        $this->settings = (object)$this->settings;
	// }

	public $banner;
	public $dados;
	// public $settings;
}