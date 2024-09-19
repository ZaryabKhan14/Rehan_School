<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionFreeze extends Model
{
    use HasFactory;
    protected $table = 'admission_freezes';

    protected $fillable = [
        'student_id',
        'name',
        'class',
        'campus',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

}
