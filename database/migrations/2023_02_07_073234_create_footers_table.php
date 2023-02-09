<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('footers', function (Blueprint $table) {
      $table->id();
      $table->string('numero')->nullable();
      $table->string('short_description')->nullable();
      $table->string('country')->nullable();
      $table->string('adress')->nullable();
      $table->string('email')->nullable();
      $table->string('facebook')->nullable();
      $table->string('twitter')->nullable();
      $table->string('behance')->nullable();
      $table->string('linkedin')->nullable();
      $table->string('insta')->nullable();
      $table->string('copyright')->nullable();
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
    Schema::dropIfExists('footers');
  }
};
