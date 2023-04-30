<?php

namespace App\Services;

class ResponseService
{
    function response($success, $httpStatusCode, $message, $data = [])
    {
        return response()->json(
            [
                "success" => $success,
                "statusCode" => $httpStatusCode,
                "message" => $message,
                "data" => $data
            ]

        );
    }
}
