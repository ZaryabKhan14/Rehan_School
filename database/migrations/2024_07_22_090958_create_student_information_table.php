<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->string('student_id'); // Changed to string method
            $table->string('name');
            $table->string('email');
            $table->integer('age');
            $table->date('date_of_birth');
            $table->string('class');
            $table->string('campus');
            $table->string('roll_number');
            $table->date('date_of_joining');
            $table->text('reason_for_joining');
            $table->string('city');
            $table->string('country');
            $table->text('self_introduction');
            $table->string('fathers_name');
            $table->integer('fathers_age');
            $table->string('fathers_job');
            $table->string('fathers_whatsapp_number');
            $table->string('mothers_name');
            $table->integer('mothers_age');
            $table->string('mothers_job');
            $table->string('mothers_whatsapp_number');
            $table->integer('number_of_siblings');
            $table->json('favorite_food_dishes'); // Store as JSON
            $table->text('plans_if_given_1_crore');
            $table->text('biggest_wish');
            $table->text('vision_for_10_years_ahead');
            $table->json('ideal_personalities'); // Store as JSON
            $table->string('students_whatsapp_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_information');
    }
};
