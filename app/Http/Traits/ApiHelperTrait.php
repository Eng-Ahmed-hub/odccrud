<?php

namespace App\Http\Traits;

trait ApiHelperTrait
{

    public function errorResponse($message, $code)
    {
        return response()->json([
            'status' => false,
            'status Code' => $code,
            'message' => $message,
        ], $code);
    }


    public function successResponse($key, $data, $code, $message = null)
    {
        return response()->json([
            'status' => true,
            'status Code' => $code,
            'msg' => $message ?? '',
            $key => $data,
        ], $code);
    }
    public function successMessage($message)
    {
        return response()->json([
            'status' => true,
            'msg' => $message

        ], 200);
    }
};
