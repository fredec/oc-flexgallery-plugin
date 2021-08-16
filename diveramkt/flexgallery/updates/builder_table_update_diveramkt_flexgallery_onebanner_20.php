<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner20 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('btn_label', 50)->default('null')->change();
            $table->string('btn_label2', 50)->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('btn_label', 20)->default('NULL')->change();
            $table->string('btn_label2', 20)->default('NULL')->change();
        });
    }
}
