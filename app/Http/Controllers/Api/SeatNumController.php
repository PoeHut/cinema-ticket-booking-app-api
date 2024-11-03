<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Classes\ValidatorClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeatNumResource;
use App\Repositories\Interfaces\SeatNumRepositoryInterface;

class SeatNumController extends Controller
{
    protected $seatNumRepository;

    public function __construct(SeatNumRepositoryInterface $seatNumRepository) {
        $this->seatNumRepository = $seatNumRepository;
    }

    public function createSeat(Request $request)  {
        try {
            $response = ValidatorClass::ValidateRequest($request->all(), [
                'seat_id' => 'required|string',
                'seat_no' => 'required|string|max:250',
            ]);
    
            if($response['status']) {
                $result = $this->seatNumRepository->createSeat($request->all());
    
                return ResponseClass::sendResponse(new SeatNumResource($result));
            } else { 
                return response()->json($response);
            }
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getAllSeats() {
        try {
           
            $results = $this->seatNumRepository->getAllSeats();

            return ResponseClass::sendResponse(SeatNumResource::collection($results));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getRoomSeats() {
        try {
           
            $results = $this->seatNumRepository->getRoomSeats();

            return ResponseClass::sendResponse(SeatNumResource::collection($results));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getSeatById($id) {
        try {
           
            $result = $this->seatNumRepository->getSeatById($id);
    
            return ResponseClass::sendResponse(new SeatNumResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function updateSeat(Request $request) {
        try {
            
            $seat = $this->seatNumRepository->getSeatById($request->id);
            $result = $this->seatNumRepository->updateSeat($request->all(), $seat);

            return ResponseClass::sendResponse(new SeatNumResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function deleteSeat(Request $request) {
        try {
            
            $seat = $this->seatNumRepository->getSeatById($request->id);
            
            $result = $this->seatNumRepository->deleteSeat($seat);

            return ResponseClass::sendResponse($request->id, "Delete Successfully.");
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }
}
