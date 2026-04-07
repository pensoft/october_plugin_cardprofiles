<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftCardprofilesItems extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
}