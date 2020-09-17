<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_requests', function (Blueprint $table) {
          $table->id();
          $table->string("full_name");
          $table->string("organization");
          $table->string("organization_area");
          $table->string("email");
          $table->longText("proposal");
          $table->longText('replay')->nullable();
          $table->foreignId('partner_id')->constrained('partners');
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
        Schema::dropIfExists('partner_requests');
    }
}
