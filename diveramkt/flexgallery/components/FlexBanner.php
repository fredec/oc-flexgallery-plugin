<?php namespace Diveramkt\FlexGallery\Components;

use Cms\Classes\ComponentBase;

use Diveramkt\FlexGallery\Models\Banner;
use Diveramkt\FlexGallery\Models\Settings;
use System\Classes\MediaLibrary;
use Request;

class FlexBanner extends ComponentBase
{

	public function componentDetails(){
		return [
			'name' => 'Banner',
			'description' => 'Banners are images with link and button'
		];
	}

	public function defineProperties(){
		return [
			'banner' => [
				'title' => 'Banner',
				'description' => 'The banners that will be show',
				'type' => 'dropdown',
			],
			'showThumbs' => [
				'title' => 'Show Thumbs',
				'description' => 'True to show thumbnails, False to show the original image',
				'default' => 'false',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
			],
			'thumbWidth' => [
				'title' => 'Thumb Width (px)',
				'description' => 'Width of the thumb',
				'default' => '100',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Thumbnail'
			],
			'thumbHeight' => [
				'title' => 'Thumb Height (px)',
				'description' => 'Height of the thumb',
				'default' => '0',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Thumbnail'
			],
			'autoPlay' => [
				'title' => 'AutoPlay',
				'description' => 'If the transition starts automatically or not',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Options'
			],
			'autoPlaySpeed' => [
				'title' => 'AutoPlay Speed',
				'description' => 'How many seconds to slide',
				'default' => '500',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Options'
			],
			'dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Options'
			],
			'arrows' => [
				'title' => 'Arrows',
				'description' => 'Show the left and right arrows',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Options'
			],
			'infinite' => [
				'title' => 'Infinite',
				'description' => 'If the carousel is infinite or will get back',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Options'
			],
			'speed' => [
				'title' => 'Speed',
				'description' => 'The transition speed',
				'default' => '300',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Options'
			],
			'slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Options'
			],
			'slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Options'
			],

			//Breakpoint 1200px
			'r1024_dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Breakpoint 1024px'
			],
			'r1024_slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Breakpoint 1024px'
			],
			'r1024_slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Breakpoint 1024px'
			],

			//Breakpoint 767px
			'r600_dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Breakpoint 600px'
			],
			'r600_slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Breakpoint 600px'
			],
			'r600_slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Breakpoint 600px'
			],

			//Breakpoint 480px
			'r480_dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Breakpoint 480px'
			],
			'r480_slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Breakpoint 480px'
			],
			'r480_slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Breakpoint 480px'
			],
		];
	}

	public function onRun(){
		$this->banner = $this->getBanner();
		$this->gallery = $this->getBanner();

		if(isset($this->gallery->banners[0]->id)){
			foreach ($this->gallery->banners as $key => $value) {
				if(empty($value->link)) continue;
				if($value->btn_tipo == 1) $value->link=$this->whatsLink($value->link);
				else $value->link=$this->prep_url($value->link);
				$value->target=$this->target($value->link);
				if($value->btn_label == '') $value->btn_label='acessar';
				if(isset($value->links_extra[0])){
					$links_extra=[];
					foreach ($value->links_extra as $key2 => $vet) {
						if(!isset($vet['enabled']) || !$vet['enabled']) continue;
						if($vet['type'] == 'file' && empty($vet['file'])) continue;
						if($vet['type'] != 'file' && empty($vet['link'])) continue;

						if($vet['type'] == 'link'){
							$vet['url']=$this->prep_url($vet['link']);
						}elseif($vet['type'] == 'whatsapp'){
							$vet['url']=$this->whatsLink($vet['link']);
						}elseif($vet['type'] == 'phone'){
							$vet['url']='tel:'.preg_replace("/[^0-9]/", "", $vet['link']);
						}elseif($vet['type'] == 'file'){
							$vet['url']=url(MediaLibrary::url($vet['file']));
							$vet['target']=' target=_blank ';
						}
						if(isset($vet['url']) && !isset($vet['target'])) $vet['target']=$this->target($vet['url']);
						if(!isset($vet['label']) || empty($vet['label'])) $vet['label']=$vet['url'];
						$links_extra[]=$vet;
					}
					$value->links_extra=$links_extra;
				}
			}
		}
		
		$this->showThumbs = $this->property('showThumbs');
		$this->thumbWidth = $this->property('thumbWidth');
		$this->thumbHeight = $this->property('thumbHeight');
		$this->dots = $this->property('dots');
		$this->arrows = $this->property('arrows');
		$this->infinite = $this->property('infinite');
		$this->speed = $this->property('speed');
		$this->slidesToShow = $this->property('slidesToShow');
		$this->slidesToScrow = $this->property('slidesToScrow');
		$this->autoPlay = $this->property('autoPlay');
		$this->autoPlaySpeed = $this->property('autoPlaySpeed');

		$this->r1024_slidesToShow = $this->property('r1024_slidesToShow');
		$this->r1024_slidesToScrow = $this->property('r1024_slidesToScrow');
		$this->r1024_dots = $this->property('r1024_dots');

		$this->r600_slidesToShow = $this->property('r600_slidesToShow');
		$this->r600_slidesToScrow = $this->property('r600_slidesToScrow');
		$this->r600_dots = $this->property('r600_dots');

		$this->r480_slidesToShow = $this->property('r480_slidesToShow');
		$this->r480_slidesToScrow = $this->property('r480_slidesToScrow');
		$this->r480_dots = $this->property('r480_dots');

		$this->createSettingsFields();
	}

	public function getBannerOptions(){
		return $this->getAllBanner();
	}

	protected function getBanner(){
		if ($this->property('banner') == "") {
			return Banner::first();
		}else{
			return Banner::where('id',$this->property('banner'))->first();
		}

	}

	protected function getAllBanner(){
		$result=array();
		$query = Banner::all();

		foreach ($query as $id=>$c)
			$result[$c->id] = $c->title;

		return $result;
	}

	public function createSettingsFields(){
		$defaultFields = Settings::instance()->toArray();

		if (!empty($defaultFields)) {
			foreach ($defaultFields['value'] as $key => $defaultValue) {
				$this->settings[$key] = $defaultValue;
			}
		}

		$this->settings = (object)$this->settings;
	}


	public function whatsLink($tel=false, $msg=false){
		if(Request::server('HTTP_USER_AGENT')){
			$iphone = strpos(Request::server('HTTP_USER_AGENT'),"iPhone");
			$android = strpos(Request::server('HTTP_USER_AGENT'),"Android");
			$palmpre = strpos(Request::server('HTTP_USER_AGENT'),"webOS");
			$berry = strpos(Request::server('HTTP_USER_AGENT'),"BlackBerry");
			$ipod = strpos(Request::server('HTTP_USER_AGENT'),"iPod");

			$extra=''; if(!strpos("[".$tel."]", "+")) $extra='55';

			if ($iphone || $android || $palmpre || $ipod || $berry == true) {
				$link='https://api.whatsapp.com/send?phone='.$extra;
			} else {
				$link='https://web.whatsapp.com/send?phone='.$extra;
			}
			$link=$link.preg_replace("/[^0-9]/", "", $tel);
			if($msg) $link.='&text='.$msg;
			return $link;
		}else return $tel;
	}
	public function prep_url($url=false){
		$base = 'http' . ((Request::server('HTTPS') == 'on') ? 's' : '') . '://' . Request::server('HTTP_HOST') . str_replace('//', '/', dirname(Request::server('SCRIPT_NAME')) . '/');

		if(!strpos("[".$url."]", "http://") && !strpos("[".$url."]", "https://")){
			$veri=str_replace('www.','',Request::server('HTTP_HOST'). str_replace('//', '/', dirname(Request::server('SCRIPT_NAME'))));
			if(!strpos("[".$url."]", ".") && !strpos("[".$veri."]", "https://")){
				$url='http' . ((Request::server('HTTPS') == 'on') ? 's' : '') . '://www.'.str_replace(array('//','\/'),array('/','/'),$veri.'/'.$url);
			}else $url='http://'.$url;
		}
		return str_replace('//www.','//',$url);
	}

	public function target($link){
		$url = 'http' . ((Request::server('HTTPS') == 'on') ? 's' : '') . '://' . Request::server('HTTP_HOST');
		$link=str_replace('//www.','//',$link); $url=str_replace('//www.','//',$url);
		if(!strpos("[".$link."]", $url)) return 'target=_blank';
		else return 'target=_parent';
	}

	public $banner;
	public $gallery;
	public $showThumbs;

	// Thumb
	public $thumbWidth;
	public $thumbHeight;

	//Options
	public $dots;
	public $arrows;
	public $infinite;
	public $speed;
	public $slidesToShow;
	public $slidesToScrow;
	public $autoPlay;
	public $autoPlaySpeed;

	//Responsive 1200
	public $r1024_slidesToShow;
	public $r1024_slidesToScrow;
	public $r1024_dots;

	//Responsive 767
	public $r600_slidesToShow;
	public $r600_slidesToScrow;
	public $r600_dots;

	//Responsive 480
	public $r480_slidesToShow;
	public $r480_slidesToScrow;
	public $r480_dots;
	
	public $settings;
}