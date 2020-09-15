<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
          $table->id();
          $table->string("name_en");
          $table->string("name_ar");
          $table->longText("description_en");
          $table->longText("description_ar");
          $table->text("qualification_en");
          $table->text("qualification_ar");
          $table->date("start_at");
          $table->date("end_at");
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
        Schema::dropIfExists('volunteers');
    }
}
