<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Classes\ValidatorClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Repositories\Interfaces\MovieRepositoryInterface;

class MovieController extends Controller
{
    protected $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository) {
        $this->movieRepository = $movieRepository;
    }

    public function createMovie(Request $request)  {
        try {
            $response = ValidatorClass::ValidateRequest($request->all(), [
                'name' => 'required|string|max:250',
            ]);
    
            if($response['status']) {
                $result = $this->movieRepository->createMovie($request->all());
    
                return ResponseClass::sendResponse(new MovieResource($result));
            } else { 
                return response()->json($response);
            }
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getAllMovies() {
        try {
           
            $result = $this->movieRepository->getAllMovies();
    
            return ResponseClass::sendResponse(MovieResource::collection($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function getMovieById($id) {
        try {
           
            $result = $this->movieRepository->getMovieById($id);
    
            return ResponseClass::sendResponse(new MovieResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function updateMovie(Request $request) {
        try {
            
            $movie = $this->movieRepository->getMovieById($request->id);
            $result = $this->movieRepository->updateMovie($request->all(), $movie);

            return ResponseClass::sendResponse(new MovieResource($result));
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function deleteMovie(Request $request) {
        try {
            
            $movie = $this->movieRepository->getMovieById($request->id);
            
            $result = $this->movieRepository->deleteMovie($movie);

            return ResponseClass::sendResponse($request->id, "Delete Successfully.");
            
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }
}
