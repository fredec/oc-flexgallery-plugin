<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner6 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->renameColumn('type', 'position');
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->renameColumn('position', 'type');
        });
    }
}
