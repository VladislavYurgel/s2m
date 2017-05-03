<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerReplies extends \Eloquent {
    protected $primaryKey = 'seller_reply_id';

    protected $fillable = [
        'title', 'description', 'delivery', 'price', 'status', 'created_by'
    ];
}
