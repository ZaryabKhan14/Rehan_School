<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'student_id',
        'student_name',
        'student_campus',
        'amount',
        'payment_date',
        'stripe_payment_id',
        'payment_status',
    ];
}
