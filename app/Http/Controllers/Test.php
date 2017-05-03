<?php

namespace App\Http\Controllers;

use App\Models\Cities;

class Test {

    public function make() {
        dd(Cities::find(1));
    }
}