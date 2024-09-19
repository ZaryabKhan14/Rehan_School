<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    protected $table = 'student_information';

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'age',
        'date_of_birth',
        'campus',
        'roll_number',
        'date_of_joining',
        'reason_for_joining',
        'city',
        'country',
        'self_introduction',
        'fathers_name',
        'fathers_age',
        'fathers_job',
        'fathers_whatsapp_number',
        'mothers_name',
        'mothers_age',
        'mothers_job',
        'mothers_whatsapp_number',
        'number_of_siblings',
        'favorite_food_dishes',
        'plans_if_given_1_crore',
        'biggest_wish',
        'vision_for_10_years_ahead',
        'ideal_personalities',
        'students_whatsapp_number'
    ];

    protected $casts = [
        'favorite_food_dishes' => 'array',
        'ideal_personalities' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
