<?php

namespace App\Http\Controllers\Api;

use Response;

class Api {

    public static function success($data) {
        $result = [
            'success' => true,
            'response' => $data
        ];
        Response::json($result);
    }

    public static function error($data) {
        $result = [
            'success' => false,
            'response' => $data
        ];
        Response::json($result);
    }
}