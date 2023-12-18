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
        Schema::create('finance_budget_revenues', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('subject');
            $table->string('slug')->nullable();
            $table->text('content');
            $table->string('file');
            $table->string('image');
            $table->string('date_gregorian');
            $table->string('date_shamsi');
            $table->string('date_ghamari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_budget_revenues');
    }
};
