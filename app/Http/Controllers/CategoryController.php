<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        //$model = app(Category::class);
        return \view('categories.index', ['newsCategories' => $categoriesQueryBuilder->getAll()]);
    }

    public function show(NewsQueryBuilder $newsQueryBuilder)
    {

        return view('news.index', ['news' => $newsQueryBuilder->getLastNews()]);
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
