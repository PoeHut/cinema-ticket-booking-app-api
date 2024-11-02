<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Classes\ValidatorClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeatResource;
use App\Repositories\Interfaces\SeatRepositoryInterface;

class SeatController extends Controller
{
    protected $seatRepository;

    public function __construct(SeatRepositoryInterface $seatRepository) {
        $this->seatRepository = $seatRepository;
    }

    public function createSeat(Request $request)  {
        try {
            $response = ValidatorClass::ValidateRequest($request->all(), [
                'row_name' => 'required|string|max:250',
                'column' => 'required|string|max:250',
                'row_seat_count' => 'required|integer',
            ]);
    
            if($response['status']) {
                $result = $this->seatRepository->createSeat($request->all());
    
                return ResponseClass::sendResponse(new SeatResource($result));
            } else { 
                return response()->json($response);
            }
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getAllSeats() {
        try {
           
            $results = $this->seatRepository->getAllSeats();

            return ResponseClass::sendResponse(SeatResource::collection($results));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getSeatById($id) {
        try {
           
            $result = $this->seatRepository->getSeatById($id);
    
            return ResponseClass::sendResponse(new SeatResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function updateSeat(Request $request) {
        try {
            
            $seat = $this->seatRepository->getSeatById($request->id);
            $result = $this->seatRepository->updateSeat($request->all(), $seat);

            return ResponseClass::sendResponse(new SeatResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function deleteSeat(Request $request) {
        try {
            
            $seat = $this->seatRepository->getSeatById($request->id);
            
            $result = $this->seatRepository->deleteSeat($seat);

            return ResponseClass::sendResponse($request->id, "Delete Successfully.");
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }
}
