<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        return view('admin.categories.index', ['categoryList' => $categoriesQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $validated = $request->validated();

        $category = Category::create($validated);
        if ($category !== false) {
            return \redirect()->route('admin.categories.index')->with('success', 'Category has been created');
        }

        return \back()->with('error', 'Category has not been create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Category $category)
    {
        $category = $category->fill($request->validated());
        if ($category->save()) {

            return \redirect()->route('admin.categories.index')->with('success', 'Category has been update');
        }

        return \back()->with('error', 'Category has not been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
