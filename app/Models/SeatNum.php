<?php

namespace App\Models;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeatNum extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'seat_id',
        'seat_no'
    ];

    public function seats() : BelongsTo {
        return $this->belongsTo(Seat::class);
    }
}
