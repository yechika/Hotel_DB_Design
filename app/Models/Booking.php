<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'room_id',
        'user_id',
        'start_date',
        'end_date'
    ];

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
