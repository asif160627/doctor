<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorSchedulingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_schedulings', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('doctor_id');
              $table->foreign('doctor_id')
                ->references('id')->on('doctor_profiles')
                ->onDelete('cascade');
            $table->date('date');
            $table->time('starttime',0);
            $table->time('endtime',0);
            $table->integer('duration');
            $table->string('time');
            $table->string('slots')->nullable();
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
        Schema::dropIfExists('doctor_schedulings');
    }
}
