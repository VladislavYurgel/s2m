<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends \Eloquent {
    protected $primaryKey = 'city_id';

    protected $fillable = [
        'city_name', 'country_id'
    ];

    public function country() {
        return $this->hasOne('Models\Countries');
    }
}
