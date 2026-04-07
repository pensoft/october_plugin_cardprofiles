<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftCardprofilesCategory extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pensoft_cardprofiles_category')) {
            Schema::create('pensoft_cardprofiles_category', function(Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('slug', 255);
                $table->text('body')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('pensoft_cardprofiles_category')) {
            Schema::dropIfExists('pensoft_cardprofiles_category');
        }
    }
}