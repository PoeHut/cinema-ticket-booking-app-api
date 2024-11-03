<?php

namespace App\Models;

use App\Models\SeatNum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'row_name',
        'column',
        'row_seat_count'
    ];

    public function seat_nums(): HasMany
    {
        return $this->hasMany(SeatNum::class);
    }
}
