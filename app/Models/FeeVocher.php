<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeVocher extends Model
{
    use HasFactory;
    protected $table = 'fee_vouchers';

    protected $fillable = [
        'student_id',
        'student_name',
        'student_campus',
        'year',
        'month',
        'amount',
        'status',
        'generated_at'
    ];
    

}
