<?php
namespace App\Classes;
use Illuminate\Support\Facades\DB;

class RollbackClass {
    public static function rollback($e) {
        DB::rollBack();
    
        logger()->error($e->getMessage());
        
        return response()->json([
            'error' => 'Something went wrong!'
        ], 500);
    }
}