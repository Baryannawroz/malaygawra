<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_phone')->nullable();
            $table->string('mother_phone')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->integer('school_stage');
            $table->unsignedBigInteger('street_id');
            $table->unsignedBigInteger('stage_id_parwarda');
            $table->unsignedBigInteger('stage_id_quran');
            $table->string('photo_path')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('cascade');
            $table->foreign('stage_id_quran')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('stage_id_parwarda')->references('id')->on('stages')->onDelete('cascade');
            $table->boolean('gender');
            $table->boolean('marital_status'); // Adjust the position as needed

            $table->date('birth_date');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
