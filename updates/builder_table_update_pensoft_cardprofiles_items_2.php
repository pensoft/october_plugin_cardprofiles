<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftCardprofilesItems2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->integer('partner_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->dropColumn('partner_id');
        });
    }
}
