<?php
namespace App\Repositories\Interfaces;

use App\Models\Booking;

interface BookingServiceRepositoryInterface {
    public function createBooking(array $data);
    public function getBookedRoomSeats($show_time_id);
}