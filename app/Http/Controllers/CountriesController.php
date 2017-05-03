<?php

namespace App\Http\Controllers;
use App\Models\Cities;
use App\Models\Countries;
use Exception;
use phpDocumentor\Reflection\Types\Array_;

class CountriesController extends Controller {

    /**
     * Create country
     *
     * @param array $data
     * @return Countries
     * @throws Exception
     */
    public function create(array $data) {
        $country = new Countries;
        $country->save($data);

        if ($country) {
            return $country;
        } else {
            throw new Exception("Country was not created");
        }
    }

    /**
     * Update country
     *
     * @param $id
     * @param array $data
     * @return Countries
     */
    public function update($id, array $data) {
        $country = $this->getById($id);
        $country->save($data);

        return $country;
    }

    /**
     * @param $id
     * @return Countries
     * @throws Exception
     */
    public function getById($id) {
        $country = Countries::find($id);
        if ($country) {
            return $country;
        } else {
            throw new Exception($country);
        }
    }

    /*
     * Get city by id, throw exception if country is not isset
     */
    public function getCities($id) {
        $country = $this->getById($id);
        $cities = Cities::where('country_id', $country->country_id)->get();
        return $cities;
    }
}