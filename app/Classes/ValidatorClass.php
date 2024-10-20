<?php
namespace App\Classes;

use Validator;

class ValidatorClass {
    public static function ValidateRequest(array $request, array $rules) {
        $validate = Validator::make($request, $rules);

        if($validate->fails()){
            return [
                'status' => false,
                'message' => 'Validation Error.',
                'data' => $validate->errors(),
            ];
        } 
        
        return [
            'status' => true,
            'message' => 'Validation Success.'
        ];
    }
}