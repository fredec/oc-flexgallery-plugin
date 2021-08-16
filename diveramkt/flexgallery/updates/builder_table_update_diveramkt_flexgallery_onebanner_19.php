<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner19 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('image_mobile', 255)->nullable();
            $table->integer('banner_id')->default(0)->change();
            $table->string('title', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->dropColumn('image_mobile');
            $table->integer('banner_id')->default(null)->change();
            $table->string('title', 255)->nullable(false)->change();
        });
    }
}
