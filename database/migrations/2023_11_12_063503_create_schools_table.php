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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('content');
            $table->string('address');
            $table->string('image');
            $table->integer('views')->default(0);

            $table->string('date_gregorian');
            $table->string('date_ghamari');
            $table->string('date_shamsi');

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->boolean('status');
            $table->boolean('is_approved')->default(0);

            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('center_type_id');   

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('center_type_id')->references('id')->on('center_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
