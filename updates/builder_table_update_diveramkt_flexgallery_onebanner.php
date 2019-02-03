<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner extends Migration
{
    public function up()
    {
        Schema::rename('diveramkt_flexgallery_banner', 'diveramkt_flexgallery_onebanner');
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::rename('diveramkt_flexgallery_onebanner', 'diveramkt_flexgallery_banner');
        Schema::table('diveramkt_flexgallery_banner', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
}
