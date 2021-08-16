<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDiveramktFlexgalleryOnebanner18 extends Migration
{
    public function up()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->text('description')->nullable()->unsigned(false)->change();
            $table->boolean('enabled')->default(1)->change();
        });
    }
    
    public function down()
    {
        Schema::table('diveramkt_flexgallery_onebanner', function($table)
        {
            $table->string('description', 255)->nullable()->unsigned(false)->default('')->change();
            $table->boolean('enabled')->default(0)->change();
        });
    }
}
