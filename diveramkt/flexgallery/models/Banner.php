<?php namespace Diveramkt\Flexgallery\Models;

use Model;

/**
 * Model
 */
class Banner extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
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
    public $table = 'diveramkt_flexgallery_banners';

    public $hasMany = [
        'onebanner' => [
            'Diveramkt\Flexgallery\Models\OneBanner',
            'order'      => 'sort_order desc',
        ],
        'banners' => [
            'Diveramkt\Flexgallery\Models\OneBanner',
            'scope' => 'isEnabled',
            'order'      => 'sort_order desc',
        ]
    ];
}
