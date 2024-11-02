<?php
namespace App\Repositories;

use App\Models\Seat;
use App\Repositories\Interfaces\SeatRepositoryInterface;

class SeatRepository implements SeatRepositoryInterface {
    public function createSeat(array $data) {
        return Seat::create($data);
    }

    public function getAllSeats() {
        return Seat::paginate(10);
    }

    public function getSeatById($id) {
        return Seat::where('id', $id)->first();
    }

    public function updateSeat(array $data, Seat $seat) {
        $seat->update($data);
        return $seat;
    }

    public function deleteSeat(Seat $seat) {
        return $seat->delete();
    }
}