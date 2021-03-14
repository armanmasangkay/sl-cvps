<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncodersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encoders', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('suffix');
            $table->string('municipality');
            $table->string('facility');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('encoders');
    }
}
