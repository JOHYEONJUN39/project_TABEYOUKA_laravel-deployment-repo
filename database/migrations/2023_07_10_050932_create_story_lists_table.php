<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('story_lists', function (Blueprint $table) {
      $table->id();
      $table->string('story_name', 10);
      $table->string('user_id');
      $table->foreign('user_id')
        ->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('story_lists', function(Blueprint $table) {
      $table->dropForeign(['user_id']);
      $table->dropIfExists();
    });
  }
};
