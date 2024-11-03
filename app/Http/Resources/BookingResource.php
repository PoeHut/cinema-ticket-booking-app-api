<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "show_time_id" => $this->show_time_id,
            "seat_num_id" => $this->seat_num_id,
            'created_at' => $this->created_at
        ];
    }
}
