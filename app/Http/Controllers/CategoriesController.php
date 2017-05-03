<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Exception;

class CategoriesController extends Controller {

    /**
     * Create new category
     * @param array $data
     * @return Categories
     * @throws Exception
     */
    public function create(array $data) {
        $category = new Categories;
        $category->fill($data);
        $category->save();

        if ($category) {
            return $category;
        } else {
            throw new Exception("Category was not created");
        }
    }

    /**
     * Update the category by id
     * @param $id
     * @param array $data
     * @return Categories
     * @throws Exception
     */
    public function update($id, array $data) {
        $category = $this->getById($id);
        $category->update($data);

        return $category;
    }

    /**
     * Get category by id
     * @param $id
     * @return Categories
     * @throws Exception
     */
    public function getById($id) {
        $category = Categories::find($id);
        if ($category) {
            return $category;
        } else {
            throw new Exception("Category with id {$id} not found");
        }
    }
}