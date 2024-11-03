<?php
namespace App\Repositories\Interfaces;

use App\Models\Seat;

interface SeatRepositoryInterface {
    public function createSeat(array $data);
    public function getAllSeats();
    public function getSeatById($id);
    public function updateSeat(array $data, Seat $seat);
    public function deleteSeat(Seat $seat);
}