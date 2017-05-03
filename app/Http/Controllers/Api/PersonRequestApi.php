<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\PersonRequestController;
use Illuminate\Http\Request;
use Exception;
use Route;

class PersonRequestApi {
    /**
     * @var PersonRequestController
     */
    private $personRequest;

    public function __construct() {
        $this->personRequest = new PersonRequestController();
    }

    public function create(Request $request) {
        try {
            $result = $this->personRequest->create($request->all());
            Api::success($this->$result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function update(Request $request) {
        $requestId = Route::input('request_id');
        try {
            $result = $this->personRequest->update($requestId, $request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function get() {
        $requestId = Route::input('request_id');
        try {
            $result = $this->personRequest->getById($requestId);
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function changeStatus(Request $request) {
        $requestId = Route::input('request_id');
        if ($request->has('status')) {
            try {
                $result = $this->personRequest->changeStatus($requestId, $request->get('status'));
                Api::success($result);
            } catch (Exception $exception) {
                Api::error($exception->getMessage());
            }
        } else {
            Api::error("Status not found");
        }
    }
}