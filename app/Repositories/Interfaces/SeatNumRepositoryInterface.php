<?php
namespace App\Repositories\Interfaces;

use App\Models\SeatNum;

interface SeatNumRepositoryInterface {
    public function createSeat(array $data);
    public function getAllSeats();
    public function getRoomSeats();
    public function getSeatById($id);
    public function updateSeat(array $data, SeatNum $seat);
    public function deleteSeat(SeatNum $seat);
}