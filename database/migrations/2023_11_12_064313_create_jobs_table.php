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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('content');
            $table->text('duties_and_responsibilities');
            $table->text('job_requirements');
            $table->text('submission_guideline');
            $table->string('address_dari');
            $table->boolean('status');
            $table->integer('views')->default(0);

            $table->boolean('gender');
            $table->string('minimum_education');
            $table->string('salary')->nullable();
            $table->string('vacancy_number')->nullable();
            $table->integer('no_of_jobs')->nullable();
            $table->string('year_of_experience');
            $table->string('email');
            $table->string('file');
            $table->string('start_date_gregorian');
            $table->string('start_date_shamsi');
            $table->string('start_date_ghamari');

            $table->string('expire_date_gregorian');
            $table->string('expire_date_shamsi');
            $table->string('expire_date_ghamari');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('contract_type_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
