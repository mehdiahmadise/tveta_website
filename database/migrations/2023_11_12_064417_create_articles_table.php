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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('content');
            $table->string('author');
            $table->string('image');
            $table->string('file');
            $table->integer('views')->default(0);
            $table->boolean('status')->default(0);
            $table->string('date_gregorian');
            $table->string('date_ghamari');
            $table->string('date_shamsi');

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('center_type_id'); 
            $table->unsignedBigInteger('category_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('center_type_id')->references('id')->on('center_types')->onDelete('cascade');  
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
