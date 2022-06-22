<?php namespace Diveramkt\Flexgallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use Db;

class BuilderTableInsertDiveramktFlexgalleryBanner extends Migration
{
    public function up()
    {
        Db::table('diveramkt_flexgallery_banners')->insert([
            'id' => 1,
            'title' => 'Home',
        ]);
    }
    
    public function down()
    {
        Db::table('diveramkt_flexgallery_banners')->where('id',1)->delete();
    }
}