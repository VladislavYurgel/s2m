<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonRequests extends \Eloquent {
    protected $primaryKey = 'person_request_id';

    protected $fillable = [
        'title', 'description', 'category_id', 'city_id', 'price'
    ];
}
