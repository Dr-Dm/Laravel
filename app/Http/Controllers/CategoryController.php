<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return \view('categories.index', ['newsCategories' => $this->getNewsCategories()]);
    }

    public function show(int $category_id, int $id)
    {
        return $this->getNews($category_id, $id);
    }

    public function create(): View
    {
        return \view('categories.discharge');
    }

    public function store(Request $request)
    {
        return response()->json($request->all());
    }
}
