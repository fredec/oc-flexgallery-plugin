<?php namespace Diveramkt\Flexgallery\Models;

use Model;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use Db;

/**
 * Model
 */
class BannerPages extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'diveramkt_flexgallery_banner_pages';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'banner' => 'required',
    ];

    public function getPageOptions(){
        $theme = Theme::getActiveTheme();
        $currentTheme = Theme::getEditTheme();
        $allPages = Page::listInTheme($currentTheme, true);

        $veri = Db::table($this->table)->get();
        $pags=array();
        foreach ($veri as $vet) { $pags[$vet->page]=true; }

        $retorno['']='Selecionar Página';
        foreach ($allPages as $pg) {
            if(isset($pags[$pg->id]) && $pg->id != $this->page) continue;
            $retorno[$pg->id]=ucfirst($pg->title);
        }

        return $retorno;
    }

}
