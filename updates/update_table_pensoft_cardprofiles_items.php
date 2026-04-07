<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateTablePensoftCardprofilesItems extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('pensoft_cardprofiles_items', 'sort_order')) {
            Schema::table('pensoft_cardprofiles_items', function (Blueprint $table) {
                $table->integer('sort_order')->default(1);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pensoft_cardprofiles_items', 'sort_order')) {
            Schema::table('pensoft_cardprofiles_items', function (Blueprint $table) {
                $table->dropColumn('sort_order');
            });
        }
    }
}