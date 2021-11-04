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
		if(isset($this->dados['image_share'])) $this->image_share=$this->dados['image_share'];
		if(isset($this->dados['banner'])) $this->banner=$this->dados['banner'];
		if(isset($this->dados['banner_mobile'])) $this->banner_mobile=$this->dados['banner_mobile'];


		if(isset($this->dados->id) && $this->dados->banner && $this->dados->image_share){
			$image=url(\System\Classes\MediaLibrary::url($this->dados->banner));
			$this->page['image_shared']=$image;
			\Cms\Models\ThemeData::extend(function($model) use ($image) {
				$path=['path' => $image];
				$model->addDynamicProperty('site_logo_sociais', $path);
			});
		}
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
	public $banner_mobile;
	public $dados;
	public $image_share;
	// public $settings;
}