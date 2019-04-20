<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner11 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('link2', 255)->nullable()->change();
            $table->string('btn_label2', 20)->nullable()->change();
            $table->string('btn_color2', 10)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('link2', 255)->nullable(false)->change();
            $table->string('btn_label2', 20)->nullable(false)->change();
            $table->string('btn_color2', 10)->nullable(false)->change();
        });
    }
}
