<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'medication_type',
        'medicine_name',
        'start_date',
        'end_date',
        'alarm_time',
        'alarm_frequency'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
