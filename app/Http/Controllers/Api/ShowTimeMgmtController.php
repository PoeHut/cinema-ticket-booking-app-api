<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Classes\ValidatorClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Http\Resources\ShowTimeMgmtResource;
use App\Repositories\Interfaces\ShowTimeMgmtRepositoryInterface;

class ShowTimeMgmtController extends Controller
{
    protected $showTimeRepository;

    public function __construct(ShowTimeMgmtRepositoryInterface $showTimeRepository) {
        $this->showTimeRepository = $showTimeRepository;
    }

    public function createMovieShowTime(Request $request)  {
        try {
            $response = ValidatorClass::ValidateRequest($request->all(), [
                'movie_id' => 'required|string',
                'price' => 'required',
                'show_date' => 'required|date',
                'show_time' => 'required'
            ]);
    
            if($response['status']) {
                $result = $this->showTimeRepository->createMovieShowTime($request->all());
    
                return ResponseClass::sendResponse(new ShowTimeMgmtResource($result));
            } else { 
                return response()->json($response);
            }
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getAllMovieShowTime() {
        try {
           
            $result = $this->showTimeRepository->getAllMovieShowTime();
    
            return ResponseClass::sendResponse(MovieResource::collection($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getMovieShowTimeById($id) {
        try {
           
            $result = $this->showTimeRepository->getMovieShowTimeById($id);
    
            return ResponseClass::sendResponse(new MovieResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function updateMoiveShowTime(Request $request) {
        try {
            
            $showTime = $this->showTimeRepository->getShowTimeById($request->id);
            $result = $this->showTimeRepository->updateMoiveShowTime($request->all(), $showTime);

            return ResponseClass::sendResponse(new ShowTimeMgmtResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function deleteMovieShowTime(Request $request) {
        try {
            
            $showTime = $this->showTimeRepository->getShowTimeById($request->id);
            $result = $this->showTimeRepository->deleteMovieShowTime($showTime);

            return ResponseClass::sendResponse($request->id, "Delete Successfully.");
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }
}
