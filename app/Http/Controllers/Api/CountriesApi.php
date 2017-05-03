<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\CountriesController;
use Illuminate\Http\Request;
use Route;
use Exception;

class CountriesApi {

    private $country;

    public function __construct() {
        $this->country = new CountriesController();
    }

    public function create(Request $request) {
        try {
            $result = $this->country->create($request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function update(Request $request) {
        $countryId = Route::input('country_id');
        try {
            $result = $this->country->update($countryId, $request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function get() {
        $countryId = Route::input('country_id');
        try {
            $result = $this->country->getById($countryId);
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function cities() {
        try {
            $countryId = Route::input('country_id');
            $result = $this->country->getCities($countryId);
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }
}