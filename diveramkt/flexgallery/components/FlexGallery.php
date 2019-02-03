<?php namespace Diveramkt\FlexGallery\Components;

use Cms\Classes\ComponentBase;

use Diveramkt\FlexGallery\Models\Gallery;
use Diveramkt\FlexGallery\Models\Settings;

class FlexGallery extends ComponentBase
{

	public function componentDetails(){
		return [
			'name' => 'Gallery',
			'description' => 'A gallery to show'
		];
	}

	public function defineProperties(){
		return [
			'gallery' => [
				'title' => 'Gallery',
				'description' => 'The gallery that will be show',
				'type' => 'dropdown',
			],
			'showThumbs' => [
				'title' => 'Show Thumbs',
				'description' => 'True to show thumbnails, False to show the original image',
				'default' => 'false',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
			],
			'zoomImages' => [
				'title' => 'Zoom Images',
				'description' => 'Zoom image when user click over it',
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
			'activeSlider' => [
				'title' => 'Slide images?',
				'description' => 'If there is sliding effect or not',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider'
			],
			'autoPlay' => [
				'title' => 'AutoPlay',
				'description' => 'If the transition starts automatically or not',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider'
			],
			'autoPlaySpeed' => [
				'title' => 'AutoPlay Speed',
				'description' => 'How many seconds to slide',
				'default' => '500',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider'
			],
			'dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider'
			],
			'arrows' => [
				'title' => 'Arrows',
				'description' => 'Show the left and right arrows',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider'
			],
			'infinite' => [
				'title' => 'Infinite',
				'description' => 'If the carousel is infinite or will get back',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider'
			],
			'speed' => [
				'title' => 'Speed',
				'description' => 'The transition speed',
				'default' => '300',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider'
			],
			'slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider'
			],
			'slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider'
			],

			//Breakpoint 1200px
			'r1024_dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider Breakpoint 1024px'
			],
			'r1024_slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider Breakpoint 1024px'
			],
			'r1024_slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider Breakpoint 1024px'
			],

			//Breakpoint 767px
			'r600_dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider Breakpoint 600px'
			],
			'r600_slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider Breakpoint 600px'
			],
			'r600_slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider Breakpoint 600px'
			],

			//Breakpoint 480px
			'r480_dots' => [
				'title' => 'Dots',
				'description' => 'Show dots do navigation',
				'default' => 'true',
				'type' => 'dropdown',
				'options' => ['true' => 'True', 'false' => 'False'],
				'group' => 'Slider Breakpoint 480px'
			],
			'r480_slidesToShow' => [
				'title' => 'Slide to show',
				'description' => 'How many slides to show at once',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider Breakpoint 480px'
			],
			'r480_slidesToScrow' => [
				'title' => 'Slide to scrow',
				'description' => 'How many slides will scrow in each transition',
				'default' => '4',
				'validationPattern' => '^[0-9]+$',
				'validationMessage' => 'Only numbers allowed',
				'group' => 'Slider Breakpoint 480px'
			],
		];
	}

	public function onRun(){
		$this->gallery = $this->getGallery();
		$this->showThumbs = $this->property('showThumbs');
		$this->zoomImages = $this->property('zoomImages');

		$this->thumbWidth = $this->property('thumbWidth');
		$this->thumbHeight = $this->property('thumbHeight');

		$this->activeSlider = $this->property('activeSlider');
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

	public function getGalleryOptions(){
		return $this->getAllGalery();
	}

	protected function getGallery(){
		if ($this->property('gallery') == "") {
			return Gallery::first();
		}else{
			return Gallery::where('id',$this->property('gallery')+1)->first();
		}

	}

	protected function getAllGalery(){
		$query = Gallery::all();

		foreach ($query as $id=>$c)
	        $result[$id] = $c->title;

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

	public $gallery;
	public $showThumbs;
	public $zoomImages;

	// Thumb
	public $thumbWidth;
	public $thumbHeight;

	//Options
	public $activeSlider;
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