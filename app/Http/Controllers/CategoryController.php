<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(): View
    {
        $model = app(Category::class);
        return \view('categories.index', ['newsCategories' => $model->getCategories()]);
    }

    public function show(int $category_id, int $id)
    {
        $model = app(Category::class);
        return $model->getCategoriesById($category_id, $id);
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
