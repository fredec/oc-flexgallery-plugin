<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDiveramktFlexgalleryBanner extends Migration
{
    public function up()
    {
        Schema::create('diveramkt_flexgallery_banner', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('banners_id');
            $table->string('title', 255);
            $table->string('description', 255);
            $table->string('link', 255);
            $table->string('btn_label', 20);
            $table->string('btn_color', 10);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('diveramkt_flexgallery_banner');
    }
}
