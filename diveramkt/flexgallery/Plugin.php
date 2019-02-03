<?php namespace Diveramkt\Flexgallery;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		'Diveramkt\FlexGallery\Components\FlexGallery' => 'FlexGallery',
            'Diveramkt\FlexGallery\Components\FlexBanner' => 'FlexBanner'
    	];
    }

    public function registerPageSnippets()
    {
    	return [
    		'Diveramkt\FlexGallery\Components\FlexGallery' => 'FlexGallery',
            'Diveramkt\FlexGallery\Components\FlexBanner' => 'FlexBanner'
    	];
    }
    
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Flex Gallery',
                'description' => 'Manage the Flex Gallery settings to have a better experience using the plugin.',
                'category'    => 'DiveraMkt',
                'icon'        => 'icon-image',
                'class'       => 'DiveraMkt\FlexGallery\Models\Settings',
                'order'       => 500,
                'keywords'    => 'slide flex gallery banner link diveramkt',
                'permissions' => ['flexgallery.manage_flexgallery']
            ]
        ];
    }

    public function onRun()
    {
        //$this->addJs('/plugins/acme/blog/assets/javascript/blog-controls.js');
    }
}
