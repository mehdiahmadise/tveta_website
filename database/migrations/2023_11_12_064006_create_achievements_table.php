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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('subject');
            $table->string('slug')->nullable();
            $table->text('content');
            $table->string('file');
            $table->boolean('status');
            $table->string('image');
            $table->integer('views')->default(0);
            $table->integer('comment_count')->default(0);
            $table->string('date_gregorian');
            $table->string('date_shamsi');
            $table->string('date_ghamari');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
