<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftCardprofilesItems2 extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->integer('partner_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->dropColumn('partner_id');
        });
    }
}