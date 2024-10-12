<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeizureRecord extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'time', 'duration', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
