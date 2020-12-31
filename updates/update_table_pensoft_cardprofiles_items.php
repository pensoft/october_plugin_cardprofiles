<?php

namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateTablePensoftCardprofilesItems extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('pensoft_cardprofiles_items', 'sort_order')) {
            Schema::table('pensoft_cardprofiles_items', function ($table) {
                $table->integer('sort_order')->default(1);
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('pensoft_cardprofiles_items', 'sort_order')) {
            Schema::table('pensoft_cardprofiles_items', function ($table) {
                $table->dropColumn('sort_order');
            });
        }
    }
}
