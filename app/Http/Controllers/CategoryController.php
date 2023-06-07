<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        //return $this->getNewsCategories();
        return \view('categories.index', ['newsCategories' => $this->getNewsCategories()]);
    }

    public function show(int $category_id, int $id) {
        return $this->getNews($category_id, $id);
    }
}
