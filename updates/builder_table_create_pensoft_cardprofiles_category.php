<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftCardprofilesCategory extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_cardprofiles_category')) {
            Schema::create('pensoft_cardprofiles_category', function($table)
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
    
    public function down()
    {
        if (Schema::hasTable('pensoft_cardprofiles_category')) {
            Schema::dropIfExists('pensoft_cardprofiles_category');
        }
    }
}
