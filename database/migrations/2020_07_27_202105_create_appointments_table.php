<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
              $table->foreign('patient_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('doctor_id')->unsigned();
            $table->text('query');
            $table->date('date');
            $table->string('time');
            $table->string('media');
            $table->string('file')->nullable();
            $table->float('doctor_ammount')->default(0);
            $table->float('service_ammount')->default(0);
            $table->float('total_ammount')->default(0);
            $table->string('order_id');
            $table->integer('paid')->default(0);
            $table->integer('verified')->default(0);
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
        Schema::dropIfExists('appointments');
    }
}
