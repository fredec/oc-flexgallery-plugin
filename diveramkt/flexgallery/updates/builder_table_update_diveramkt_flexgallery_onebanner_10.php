<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner10 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('link2', 255);
            $table->string('btn_label2', 20);
            $table->string('btn_color2', 10);
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->dropColumn('link2');
            $table->dropColumn('btn_label2');
            $table->dropColumn('btn_color2');
        });
    }
}
