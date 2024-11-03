<?php
namespace App\Repositories;

use App\Models\SeatNum;
use App\Repositories\Interfaces\SeatNumRepositoryInterface;

class SeatNumRepository implements SeatNumRepositoryInterface {
    public function createSeat(array $data) {
        return SeatNum::create($data);
    }

    public function getAllSeats() {
        return SeatNum::paginate(10);
    }

    public function getRoomSeats() {
     return SeatNum::all();   
    }

    public function getSeatById($id) {
        return SeatNum::where('id', $id)->first();
    }

    public function updateSeat(array $data, SeatNum $seat) {
        $seat->update($data);
        return $seat;
    }

    public function deleteSeat(SeatNum $seat) {
        return $seat->delete();
    }
}