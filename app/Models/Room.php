<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{

    protected $fillable = [
        'name',
        'capacity',
    ];

    public function booking():HasMany
    {
        return $this->hasMany(Booking::class);
    }

}
