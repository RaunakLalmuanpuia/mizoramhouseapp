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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('status');
            $table->string('type')->nullable(); // FLAM, ON DUTY, etc.
            $table->string('applicant_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('contact')->nullable();
            $table->string('department_approval')->nullable();



            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
