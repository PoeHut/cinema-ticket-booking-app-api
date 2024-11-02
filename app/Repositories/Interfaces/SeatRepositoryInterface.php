<?php
namespace App\Repositories\Interfaces;

use App\Models\Seat;

interface SeatRepositoryInterface {
    public function createSeat(array $data);
    public function getAllSeats();
    public function getSeatById($id);
    public function updateSeat(array $data, Seat $movie);
    public function deleteSeat(Seat $movie);
}