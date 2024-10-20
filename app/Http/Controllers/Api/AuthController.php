<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Classes\ValidatorClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request) {
        try {
            $response = ValidatorClass::ValidateRequest($request->all(), [
                'name' => 'required|string|max:250',
                'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
                'password' => 'required|string|min:6'
            ]);
    
            if($response['status']) {
                $result = $this->userRepository->register([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                $result['token'] = $result->createToken($request->email)->plainTextToken;
    
                return ResponseClass::sendResponse(new UserResource($result));
            } else { 
                return response()->json($response);
            }
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }

    public function login(Request $request) {
        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
                $result = Auth::user(); 
                $result['token'] = $result->createToken($request->email)->plainTextToken;
    
                return ResponseClass::sendResponse(new UserResource($result));
            } 
        } catch(\Exception $e) {
            return ResponseClass::sendError($e->getMessage());
        }
    }
}
