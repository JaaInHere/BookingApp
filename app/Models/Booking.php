<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'room_name',
        'date',
        'room_id',
        'start_time',
        'end_time',
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function room():BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
