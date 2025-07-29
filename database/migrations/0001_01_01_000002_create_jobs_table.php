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
            $table->string('title');         // Job title
            $table->string('company');       // Company name
            $table->string('industry');      // Industry name
            $table->string('location');      // Job location
            $table->string('salary')->nullable();     // Optional salary
            $table->text('description')->nullable();  // Optional job description
            $table->timestamps();            // created_at and updated_at
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


