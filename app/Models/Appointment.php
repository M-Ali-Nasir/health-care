<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'doctor_name',
        'appointment_date',
        'appointment_time'
    ];

    // Define a relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
