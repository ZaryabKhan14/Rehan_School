<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class StudentAttendence extends Model
{
    use HasFactory;
 protected $table = 'student_attendence';

    protected $fillable = [
        'student_id',
        'status',
        'date',
        'day',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id'); // Assuming 'student_id' is the foreign key
    }
}
