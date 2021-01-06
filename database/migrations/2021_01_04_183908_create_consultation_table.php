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
        Schema::create('consultation', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->timestamps();
            $table->string('date_end');
            $table->unsignedBigInteger('patient_id')->unsigned();
            $table->unsignedBigInteger('doctor_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('CASCADE');
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation');
    }
}
