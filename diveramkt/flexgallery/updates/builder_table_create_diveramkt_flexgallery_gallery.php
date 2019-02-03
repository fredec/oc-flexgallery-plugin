<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDiveramktFlexgalleryGallery extends Migration
{
    public function up()
    {
        Schema::create('diveramkt_flexgallery_gallery', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('diveramkt_flexgallery_gallery');
    }
}
