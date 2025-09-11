<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateTablePensoftCardprofilesItems4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            if (!Schema::hasColumn('pensoft_cardprofiles_items', 'quote')) {
                $table->text('quote')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->dropColumn('quote');
        });
    }
}
