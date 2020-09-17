<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
              $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

              $table->string('gender')->nullable();
              $table->string('dob')->nullable();
              $table->string('blood')->nullable();
              $table->string('mobile')->nullable();
              $table->string('image')->default('man.jpg');

              $table->string('address1')->nullable();
              $table->string('address2')->nullable();
              $table->string('country')->nullable();
              $table->string('state')->nullable();
              $table->string('city')->nullable();
              $table->string('zip')->nullable();
                 
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
        Schema::dropIfExists('patient_profiles');
    }
}
