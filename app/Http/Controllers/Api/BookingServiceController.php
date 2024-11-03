<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Classes\ValidatorClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Repositories\Interfaces\BookingServiceRepositoryInterface;

class BookingServiceController extends Controller
{
    protected $bookingServiceRepository;

    public function __construct(BookingServiceRepositoryInterface $bookingServiceRepository) {
        $this->bookingServiceRepository = $bookingServiceRepository;
    }

    public function createBooking(Request $request)  {
        try {
            $response = ValidatorClass::ValidateRequest($request->all(), [
                'show_time_id' => 'required|string',
                'seat_num_id' => 'required|string',
            ]);
    
            if($response['status']) {
                $result = $this->bookingServiceRepository->createBooking($request->all());
    
                return ResponseClass::sendResponse(new BookingResource($result));
            } else { 
                return response()->json($response);
            }
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getBookedRoomSeats($show_time_id) {
        try {
           
            $result = $this->bookingServiceRepository->getBookedRoomSeats($show_time_id);
    
            return ResponseClass::sendResponse(BookingResource::collection($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

}
