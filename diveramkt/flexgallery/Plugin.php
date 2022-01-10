<?php namespace Diveramkt\Flexgallery;

use System\Classes\PluginBase;
use Diveramkt\Flexgallery\Models\Settings;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		// 'Diveramkt\FlexGallery\Components\FlexGallery' => 'FlexGallery',
            'Diveramkt\FlexGallery\Components\FlexBanner' => 'FlexBanner',
            'Diveramkt\FlexGallery\Components\BannersPages' => 'BannersPages',
        ];
    }

    public function registerPageSnippets()
    {
    	return [
    		// 'Diveramkt\FlexGallery\Components\FlexGallery' => 'FlexGallery',
            'Diveramkt\FlexGallery\Components\FlexBanner' => 'FlexBanner',
            'Diveramkt\FlexGallery\Components\BannersPages' => 'BannersPages',
        ];
    }
    
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Banners',
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

    // public function registerNavigation() {
    //     if(Settings::get('global_hide_button', false)) { return; }
    //     return [
    //         'flexgallery' => [
    //             'label'       => 'diveramkt.flexgallery::lang.plugin.name',
    //             'icon'        => 'icon-image',
    //             // 'iconSvg'     => 'plugins/diveramkt/flexgallery/assets/imgs/icon.svg',
    //             // 'url'         => BackendHelpers::getBackendURL(['diveramkt.flexgallery.access_records' => 'diveramkt/flexgallery/records', 'diveramkt.flexgallery.access_exports' => 'diveramkt/flexgallery/exports'], 'diveramkt.flexgallery.access_records'),
    //             // 'permissions' => ['diveramkt.flexgallery.*'],
    //             'permissions' => ['diveramkt.flexgallery.*'],
    //             'sideMenu' => [
    //                 'gallery' => [
    //                     'label'        => 'diveramkt.flexgallery::lang.flexgallery.gallery',
    //                     'icon'         => 'icon-database',
    //                     'url'          => Backend::url('diveramkt/flexgallery/gallery'),
    //                     'permissions'  => ['diveramkt.flexgallery.manage_flexgallery'],
    //                 ],
    //                 'banners' => [
    //                     'label'       => 'diveramkt.flexgallery::lang.flexgallery.banners',
    //                     'icon'        => 'icon-download',
    //                     'url'         => Backend::url('diveramkt/flexgallery/banners'),
    //                     'permissions' => ['diveramkt.flexgallery.manage_bannerss']
    //                 ],
    //             ]
    //         ]
    //     ];
    // }

    private function getPhpFunctions()
    {
        return [
            'link_whatsapp_botao' => function ($tel) {
                $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
                $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
                $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
                $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
                $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

                if ($iphone || $android || $palmpre || $ipod || $berry == true) {
                    $link='https://api.whatsapp.com/send?phone=55';
                } else {
                    $link='https://web.whatsapp.com/send?phone=55';
                }
                return $link.preg_replace("/[^0-9]/", "", $tel);
            },
            'target_link_banner' => function($link){
                if(!strpos("[".$link."]", $_SERVER['HTTP_HOST'])) return 'target="_blank"';
                else return 'target="_parent"';
            },
        ];
    }

    public function boot(){
        $class=get_declared_classes();
        if(in_array('RainLab\Translate\Plugin', $class) || in_array('RainLab\Translate\Classes\Translator', $class)){
            \Diveramkt\Flexgallery\Models\OneBanner::extend(function($model) {
                $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';
                // $model->translatable = ['subtitle','description','btn_label','image','bc_image','image_mobile','links_extra'];
            });
        }


        \Event::listen('backend.form.extendFields', function($widget)
        {
            if ($widget->isNested === false ) {

                // if (!($theme = Theme::getEditTheme())) throw new ApplicationException(Lang::get('cms::lang.theme.edit.not_found'));

                 // PluginManager::instance()->hasPlugin('RainLab.Pages') &&
                if ($widget->model instanceof \Diveramkt\Flexgallery\Models\Onebanner) {  

                    $settings=Settings::instance();
                    $banners=$settings->banners;

                    if(!isset($banners['links_extra']) || !$banners['links_extra']) $widget->removeField('links_extra');
                    if(!isset($banners['color_back']) || !$banners['color_back']){
                        $widget->removeField('enabled_color_fundo');
                        $widget->removeField('color_fundo');
                    }
                    if(!isset($banners['link_color']) || !$banners['link_color']){
                        $widget->removeField('sectioncolor');
                        $widget->removeField('btn_color');
                        $widget->removeField('infos[btn_color_text]');
                    }
                    if(!isset($banners['btn_class']) || !$banners['btn_class']){
                        $widget->removeField('btn_class');
                    }
                    if(!isset($banners['text_color']) || !$banners['text_color']) $widget->removeField('color_text');
                    if(!isset($banners['text_position']) || !$banners['text_position']) $widget->removeField('position');
                    if(!isset($banners['img_back']) || !$banners['img_back']) $widget->removeField('bc_image');
                    if(!isset($banners['side_back']) || !$banners['side_back']) $widget->removeField('side_image');

                    if(isset($banners['mobile']) && !$banners['mobile']) $widget->removeField('image_mobile');
                    if(isset($banners['text_subtitle']) && !$banners['text_subtitle']) $widget->removeField('subtitle');
                    if(isset($banners['text_description']) && !$banners['text_description']) $widget->removeField('description');

                }

            }

        });

    }

    public function onRun()
    {
        //$this->addJs('/plugins/acme/blog/assets/javascript/blog-controls.js');
    }

    public function registerMarkupTags()
    {
        $filters = [];
        // add PHP functions
        $filters += $this->getPhpFunctions();

        return [
            'filters'   => $filters,
        ];
    }
}
