<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('date_end');
            $table->string('status');
            $table->string('city');
            $table->unsignedBigInteger('patient_id')->unsigned();
            $table->unsignedBigInteger('doctor_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('CASCADE');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
