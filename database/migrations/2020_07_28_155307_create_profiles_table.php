<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->unsignedBigInteger('user_id');
              $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('field');
            $table->text('title');
            $table->text('year')->nullable();
            $table->text('to')->nullable();
            $table->text('degree')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
