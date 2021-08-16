<?php namespace Diveramkt\Flexgallery\Models;

use Model;

/**
 * Model
 */
class OneBanner extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    public $implement = array();
    public $translatable = array();

    // \Diveramkt\Flexgallery\Models\OneBanner::extend(function($model) {
    //     $model->implement = ['RainLab.Translate.Behaviors.TranslatableModel'];
    //     $model->translatable = ['subtitle','description','btn_label','image','bc_image'];
    // });
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'image' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'diveramkt_flexgallery_onebanner';

    public $belongsTo = [
        'banner' => 'Diveramkt\Flexgallery\Models\Banner',
    ];

    public function scopeIsEnabled($query) 
    {
        return $query->where('enabled', true)->orderBy('sort_order', 'asc');
    }
}
