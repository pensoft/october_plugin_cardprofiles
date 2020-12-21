<?php namespace Pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftCardprofilesItems extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_cardprofiles_items')) {
            Schema::create('pensoft_cardprofiles_items', function($table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('names', 255);
                $table->text('content')->nullable();
                $table->integer('category_id');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->integer('country_id')->nullable();
                $table->string('position', 255)->nullable();
                $table->string('slug');
                $table->string('department')->nullable();
                $table->string('email')->nullable();
    
            });
        }
    }
    
    public function down()
    {
        if (Schema::hasTable('pensoft_cardprofiles_items')) {
            Schema::dropIfExists('pensoft_cardprofiles_items');
        }
    }
}
