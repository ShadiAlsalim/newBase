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
        Schema::create('employee_job_opps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->foreignId('job_oppertunity_id')->nullable()->cascadeOnDelete();
            $table->string('status')->nullable();  //approved  , declined  , under review  
            // $table->foreignId('job_oppertunity_id')->constrained('job_oppertunities')->cascadeOnDelete();
            $table->timestamps();

            // $table->unsignedBiginteger('employee_id');
            // $table->unsignedBiginteger('job_oppertunity_id');

            // $table->foreign('employee_id')->references('id')
            //      ->on('employees')->onDelete('cascade');
            // $table->foreign('job_oppertunity_id')->references('id')
            //     ->on('job_oppertunities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_job_opps');
    }
};
