<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner16 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('color_text', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->dropColumn('color_text');
        });
    }
}
