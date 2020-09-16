<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
              $table->id();
              $table->foreignId('user_id')->constrained('users');
              $table->foreignId('project_id')->constrained('projects')->nullable();
              $table->foreignId('news_id')->constrained('news')->nullable();
              $table->foreignId('story_id')->constrained('stories')->nullable();

              $table->integer('parent_id')->unsigned()->default(0);
              $table->longText('body');
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
        Schema::dropIfExists('comments');
    }
}
