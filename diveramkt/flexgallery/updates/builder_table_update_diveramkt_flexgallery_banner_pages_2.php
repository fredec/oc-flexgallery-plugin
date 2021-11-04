<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryBannerPages2 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_banner_pages', function($table)
        {
            $table->text('infos')->nullable();
            $table->integer('image_share')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_banner_pages', function($table)
        {
            $table->dropColumn('infos');
            $table->dropColumn('image_share');
        });
    }
}
