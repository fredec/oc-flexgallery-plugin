<?php namespace Diveramkt\Flexgallery\Models;

use Model;

/**
 * Model
 */
class OneBanner extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
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
