<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ShowTimeMgmtResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cover_photo' => $this->cover_photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //Conditionally include show_times
            'show_times' => $this->when(
                $this->relationLoaded('show_times') && $this->show_times->isNotEmpty(),
                ShowTimeMgmtResource::collection($this->show_times)
            ),
        ];
    }
}
