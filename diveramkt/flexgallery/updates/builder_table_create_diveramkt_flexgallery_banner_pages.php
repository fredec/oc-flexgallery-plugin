<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDiveramktFlexgalleryBannerPages extends Migration
{
    public function up()
    {
        Schema::create('diveramkt_flexgallery_banner_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('page', 255)->nullable();
            $table->string('banner', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('diveramkt_flexgallery_banner_pages');
    }
}