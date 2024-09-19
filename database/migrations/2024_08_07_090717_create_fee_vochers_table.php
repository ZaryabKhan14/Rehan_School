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
        Schema::create('fee_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('student_name'); // Add this line
            $table->string('student_campus'); // Add this line
            $table->integer('year');
            $table->string('month');
            $table->decimal('amount', 8, 2);
            $table->string('status');
            $table->timestamp('generated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_vochers');
    }
};
