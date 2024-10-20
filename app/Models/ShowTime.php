<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShowTime extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'movie_id',
        'price',
        'show_date',
        'show_time'
    ];

    public function movie() : BelongsTo {
        return $this->belongsTo(Movie::class);
    }

    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class);
    }
}
