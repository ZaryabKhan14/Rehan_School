<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff_Information extends Model
{
    use HasFactory;
    protected $table = 'staff_information';

    // The attributes that are mass assignable.
    protected $fillable = [
        'profile_image',
        'nic_front',
        'nic_back',
        'full_name',
        'campus',
        'date_of_birth',
        'gender',
        'nationality',
        'contact_number',
        'email_address',
        'residential_address',
        'position_role',
        'date_of_joining',
        'employee_id',
        'qualifications_certifications',
        'previous_work_experience',
        'special_skills',
        'emergency_contact_details',
        'highest_degree_earned',
        'institutions_attended',
        'graduation_year',
        'additional_courses',
        'medical_history',
        'allergies',
        'health_conditions',
        'bank_name',
        'account_number',
        'account_holder_name',
        'basic_salary',
        'bank_branch',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_joining' => 'date',
        'graduation_year' => 'integer', // Correct casting for an integer year
    ];
}
