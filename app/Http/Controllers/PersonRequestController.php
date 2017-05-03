<?php

namespace App\Http\Controllers;

use App\Models\PersonRequests;
use Exception;

class PersonRequestController extends Controller {

    /**
     * Create a person request
     * @param array $data
     * @return PersonRequests
     * @throws \Exception
     */
    public function create(array $data) {
        $personRequest = new PersonRequests;
        $personRequest->fill($data);
        $personRequest->save();

        if ($personRequest) {
            return $personRequest;
        } else {
            throw new Exception("Person request was not created");
        }
    }

    /**
     * Update the person request
     * @param $id
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     * @throws Exception
     */
    public function update($id, array $data) {
        $personRequest = PersonRequests::find($id);
        $personRequest->save($data);

        return $personRequest;
    }

    /**
     * Get person request by id
     * @param $id
     * @return PersonRequests
     * @throws Exception
     */
    public function getById($id) {
        $personRequest = PersonRequests::find($id);
        if ($personRequest) {
            return $personRequest;
        } else {
            throw new Exception("Person request with id {$id} was not found");
        }
    }

    /**
     * Update status of the person request
     * @param $id
     * @param $status
     * @return PersonRequests
     */
    public function changeStatus($id, $status) {
        $personRequest = $this->getById($id);
        $personRequest->update([
            'status' => $status
        ]);

        return $personRequest;
    }
}