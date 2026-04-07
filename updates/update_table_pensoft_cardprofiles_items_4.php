<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateTablePensoftCardprofilesItems4 extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            if (!Schema::hasColumn('pensoft_cardprofiles_items', 'quote')) {
                $table->text('quote')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_cardprofiles_items', function(Blueprint $table)
        {
            $table->dropColumn('quote');
        });
    }
}