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
        Schema::create('candidacies', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('content');
            $table->text('submission_guideline');
            $table->string('address');
            $table->boolean('status');
            $table->integer('views')->default(0);
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

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidacies');
    }
};
