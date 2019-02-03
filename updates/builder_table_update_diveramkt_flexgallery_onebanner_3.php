<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner3 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('description', 255)->nullable()->change();
            $table->string('link', 255)->nullable()->change();
            $table->string('btn_label', 20)->nullable()->change();
            $table->string('btn_color', 10)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('description', 255)->nullable(false)->change();
            $table->string('link', 255)->nullable(false)->change();
            $table->string('btn_label', 20)->nullable(false)->change();
            $table->string('btn_color', 10)->nullable(false)->change();
        });
    }
}
