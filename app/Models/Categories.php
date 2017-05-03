<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends \Eloquent {
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name'
    ];
}
