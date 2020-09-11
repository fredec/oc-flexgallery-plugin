<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner17 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('btn_class')->nullable();
            $table->string('btn2_class')->nullable();
            $table->text('links')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->dropColumn('btn_class');
            $table->dropColumn('btn2_class');
            $table->dropColumn('links');
        });
    }
}
