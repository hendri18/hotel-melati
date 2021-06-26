<?php

namespace App\Helpers;


class ResponseHelper{
    public static function generateResponse($data, $message = '',$code = 200)
    {
        $response = [
            'code' => empty($data) || !$data ? 404 : $code,
            'message' => $message,
            'data' => !empty($data) ? $data : []
        ];
        return response()->json($response, $response['code']);
    }
}