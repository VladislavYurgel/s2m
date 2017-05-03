<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_requests', function (Blueprint $table) {
            $table->increments('person_request_id');
            $table->string('title', 256);
            $table->string('description', 1024);
            $table->integer('category_id');
            $table->integer('city_id');
            $table->float('price');
            $table->integer('status');
            $table->integer('created_by');
            $table->dateTime('expiry_date');
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
        Schema::dropIfExists('person_requests');
    }
}
