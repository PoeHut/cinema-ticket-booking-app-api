<?php
namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\Interfaces\BookingServiceRepositoryInterface;

class BookingServiceRepository implements BookingServiceRepositoryInterface {
    public function createBooking(array $data) {
        return Booking::create($data);
    }

    public function getBookedRoomSeats($show_time_id) {
        return Booking::where("show_time_id", $show_time_id)->get();
    }
}