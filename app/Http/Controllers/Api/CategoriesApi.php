<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Route;
use Exception;

class CategoriesApi {

    private $categories;

    public function __construct() {
        $this->categories = new CategoriesController();
    }

    public function create(Request $request) {
        try {
            $result = $this->categories->create($request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function update(Request $request) {
        $categoryId = Route::input('category_id');
        try {
            $result = $this->categories->update($categoryId, $request->all());
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }

    public function get() {
        $categoryId = Route::input('category_id');
        try {
            $result = $this->categories->getById($categoryId);
            Api::success($result);
        } catch (Exception $exception) {
            Api::error($exception->getMessage());
        }
    }
}