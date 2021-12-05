<?php

namespace App\Traits;

trait GeneralTrait
{
    public function returnData( $compact )
    {
        return response()->json(
            [
                'status' => 'sucssess',
                'stateNum' => '200',
                'error' => null,
                'data' => $compact
            ]
        )->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
        ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
