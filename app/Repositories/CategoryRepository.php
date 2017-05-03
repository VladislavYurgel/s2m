<?php

namespace App\Repositories;

use Repositories\Eloquent\Repository;

class CategoryRepository extends Repository {

    function model() {
        return 'App\Models\Categories';
    }
}