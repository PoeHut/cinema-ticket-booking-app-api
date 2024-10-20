<?php

namespace App\Models;

use App\Models\ShowTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'cover_photo',
    ];

    public function show_times() : HasMany {
        return $this->hasMany(ShowTime::class);
    }
}
