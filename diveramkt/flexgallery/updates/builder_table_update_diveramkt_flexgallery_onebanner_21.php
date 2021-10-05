<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner21 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->text('links_extra')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->dropColumn('links_extra');
        });
    }
}
