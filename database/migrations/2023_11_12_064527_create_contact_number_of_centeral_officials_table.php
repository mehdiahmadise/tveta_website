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
        Schema::create('contact_number_of_centeral_officials', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('full_name');
            $table->string('job_name');
            $table->string('phone_number');
            $table->string('phone_number_extra')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('relevant_dir_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('relevant_dir_id')->references('id')->on('relevant_directorates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_number_of_centeral_officials');
    }
};
