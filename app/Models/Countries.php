<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends \Eloquent {
    protected $primaryKey = 'country_id';

    protected $fillable = [
        'country_name'
    ];
}
