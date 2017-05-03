<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\CitiesController;
use Exception;
use Illuminate\Http\Request;
use Route;

class CitiesApi {

    private $city;

    public function __construct() {
        $this->city = new CitiesController();
    }

    public function create(Request $request) {
        try {
            $result = $this->city->create($request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function update(Request $request) {
        $cityId = Route::input('city_id');
        try {
            $result = $this->city->update($cityId, $request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function get() {
        $cityId = Route::input('city_id');
        try {
            $result = $this->city->getById($cityId);
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function delete() {
        $cityId = Route::input('city_id');
        try {
            $result = $this->city->delete($cityId);
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }
}