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
        Schema::create('headship_forms', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('content');
            $table->string('file');
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('headship_id');
            $table->foreign('headship_id')->references('id')->on('headships')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headship_forms');
    }
};
