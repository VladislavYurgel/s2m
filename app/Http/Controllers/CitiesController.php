<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Exception;

class CitiesController extends Controller {

    /**
     * Create city
     * @param array $data
     * @return Cities
     * @throws Exception
     */
    public function create(array $data) {
        if (in_array("country_id", $data)) {
            $country = new CountriesController();
            $country->getById($data['country_id']);

            $city = new Cities;
            $city->save($data);
            if ($city) {
                return $city;
            } else {
                throw new Exception("City was not created");
            }
        } else {
            throw new Exception("Country not found");
        }
    }

    /**
     * Update city by id
     * @param $id
     * @param array $data
     * @return Cities
     * @throws Exception
     */
    public function update($id, array $data) {
        if (in_array("country_id", $data)) {
            $country = new CountriesController();
            $country->getById($data['country_id']);

            $city = $this->getById($id);
            $city->save($data);

            if ($city) {
                return $city;
            } else {
                throw new Exception("City was not updated");
            }
        } else {
            throw new Exception("Country not found");
        }
    }

    /**
     * Get city by id
     * @param $id
     * @return Cities
     * @throws Exception
     */
    public function getById($id) {
        $city = Cities::find($id);
        if ($city) {
            return $city;
        } else {
            throw new Exception("City with id {$id} not found");
        }
    }

    /**
     * Delete city by id
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function delete($id) {
        $city = $this->getById($id);
        if ($city->delete()) {
            return true;
        } else {
            throw new Exception("City was not deleted");
        }
    }
}