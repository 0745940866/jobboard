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
    Schema::create('job_applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // ✅ Make nullable
        $table->foreignId('job_id')->constrained()->onDelete('cascade');
        
        $table->string('name');
        $table->string('email');
        $table->string('education_level');
        $table->string('applicant_location');
        $table->longText('cover_letter');
        $table->string('resume'); // stores file path
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('job_applications');
}
};
