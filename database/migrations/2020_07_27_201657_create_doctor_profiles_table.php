<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
              $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
              $table->integer('dept_id')->unsigned();
              $table->integer('verified')->default(0);
              $table->string('gender')->nullable();
              $table->string('dob')->nullable();
              $table->string('blood')->nullable();
              $table->string('mobile')->nullable();
              $table->string('language')->nullable();
              $table->string('specialities')->nullable();
              $table->string('medical_reg_no')->nullable();
              $table->string('file')->nullable();
              $table->text('bio')->nullable();
              $table->text('about_me')->nullable();
              $table->string('image')->default('man.jpg');

              $table->string('clinical_experience_year')->nullable();
              $table->string('clinic_name')->nullable();
              $table->string('clinic_address')->nullable();
              $table->string('clinic_image')->nullable();

              $table->string('address1')->nullable();
              $table->string('address2')->nullable();
              $table->string('country')->nullable();
              $table->string('state')->nullable();
              $table->string('city')->nullable();
              $table->string('zip')->nullable();

                $table->float('chat')->nullable();              
                $table->float('audio')->nullable();
                $table->float('video')->nullable();

              $table->string('service')->nullable();
              $table->string('specialization')->nullable();

               $table->string('degree')->nullable();              
                $table->string('college')->nullable();
                $table->string('year')->nullable();

                $table->string('exp_hospital_name')->nullable();
                $table->string('exp_year_from')->nullable();
                $table->string('exp_year_to')->nullable();
                $table->string('hospital_designation')->nullable();

                 $table->string('award')->nullable();
                $table->string('award_year')->nullable();


              $table->string('patients_consulted');
              $table->string('avg_patient_week');

              $table->string('facebook')->nullable();
              $table->string('twitter')->nullable();
              $table->string('instagram')->nullable();
              $table->string('linkedln')->nullable();
              $table->string('personal_website')->nullable();
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
        Schema::dropIfExists('doctor_profiles');
    }
}
