<?php

namespace App\Models;

use App\Models\ShowTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seat extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'row_name',
        'column',
        'row_seat_count'
    ];

    public function show_times(): BelongsToMany
    {
        return $this->belongsToMany(ShowTime::class);
    }
}
