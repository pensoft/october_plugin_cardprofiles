<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftCardprofilesItems extends Migration
{
    public function up()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
}
