<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateTablePensoftCardprofilesItems3 extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->string('linkedin_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->dropColumn('linkedin_url');
        });
    }
}