<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryBannerPages extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_banner_pages', function($table)
        {
            $table->string('banner_mobile', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_banner_pages', function($table)
        {
            $table->dropColumn('banner_mobile');
        });
    }
}
