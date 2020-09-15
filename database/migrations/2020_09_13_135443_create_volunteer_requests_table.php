<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_requests', function (Blueprint $table) {
          $table->id();
          $table->string('full_name');
          $table->string('work_place');
          $table->string('email');
          $table->string('phone');
          $table->date('age');
          $table->string('gender');
          $table->longText('qualification');
          $table->longText('replay')->nullable();
          $table->foreignId('volunteer_id')->constrained('volunteers');
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
        Schema::dropIfExists('volunteer_requests');
    }
}
