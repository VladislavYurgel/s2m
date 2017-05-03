<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Api;
use App\Models\SellerReplies;
use Exception;

class SellerRepliesController extends Controller {

    /**
     * Answer to person request
     * @param $requestId
     * @param array $data
     * @throws Exception
     */
    public function answer($requestId, array $data) {
        $personRequestController = new PersonRequestController();
        $personRequest = $personRequestController->getById($requestId);

        $sellerReply = new SellerReplies;
        $sellerReply->save($data);

        if ($sellerReply) {
            $personRequestController->changeStatus($personRequest->request_id, \Config::get('s2m.statuses.answered'));
            Api::success($sellerReply);
        } else {
            throw new Exception("Seller reply was not created");
        }
    }

    /**
     * Delete seller reply if it available to delete
     * @param $replyId
     * @return bool
     * @throws Exception
     */
    public function delete($replyId) {
        $sellerReply = $this->getById($replyId);
        if ($this->availableToDelete($sellerReply) && $sellerReply->delete()) {
            return true;
        } else {
            throw new Exception("Seller reply with id {$replyId} was not deleted");
        }
    }

    /**
     * Check if reply is available to delete
     * @param $reply
     * @return bool
     */
    private function availableToDelete($reply) {
        if ($reply->status < \Config::get('s2m.statuses.reserved')) {
            return true;
        }

        return false;
    }

    public function getById($id) {
        $sellerReply = SellerReplies::find($id);
        if ($sellerReply) {
            return $sellerReply;
        } else {
            throw new Exception("Seller reply was not found");
        }
    }
}