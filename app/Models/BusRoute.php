<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusRoute extends Model
{
    /** @use HasFactory<\Database\Factories\BusRouteFactory> */
    use HasFactory;

    protected $fillable = [
        'festival_id',
        'departure_time',
        'arrival_time'
    ];

    public function festival(): BelongsTo
    {
        return $this->belongsTo(Festival::class);
    }
}
