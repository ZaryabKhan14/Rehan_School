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
        Schema::create('staff_information', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('nic_front')->nullable();
            $table->string('nic_back')->nullable();
            $table->string('full_name');
            $table->string('campus');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('contact_number');
            $table->string('email_address')->unique();
            $table->string('residential_address');
            $table->string('position_role');
            $table->date('date_of_joining');
            $table->string('employee_id')->unique();
            $table->string('qualifications_certifications');
            $table->text('previous_work_experience');
            $table->string('special_skills');
            $table->string('emergency_contact_details');
            $table->string('highest_degree_earned');
            $table->string('institutions_attended');
            $table->year('graduation_year');
            $table->string('additional_courses');
            $table->text('medical_history')->nullable();
            $table->string('allergies')->nullable();
            $table->string('health_conditions')->nullable();
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->string('basic_salary');
            $table->string('bank_branch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff__information');
    }
};
