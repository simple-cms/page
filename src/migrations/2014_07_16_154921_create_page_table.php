<?php

use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pages', function($table)
    {
      $table->increments('id');
      $table->tinyInteger('hidden')->default(0);
      $table->integer('parent_id')->nullable();
      $table->string('slug', 80)->unique();
      $table->string('meta_title', 70)->unique();
      $table->string('meta_description', 155)->unique();
      $table->string('title', 100);
      $table->text('excerpt');
      $table->text('content');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('pages');
  }

}