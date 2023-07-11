<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    protected QueryBuilder $categoriesQueryBuilder;

    protected QueryBuilder $newsQueryBuilder;

    public function __construct(CategoriesQueryBuilder $categoriesQueryBuilder, NewsQueryBuilder $newsQueryBuilder)
    {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.news.index', ['newsList' => $this->newsQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.news.create',
        ['categories' => $this->categoriesQueryBuilder->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $news = $request->only('title', 'author', 'description');
        $news = News::create($news);
        if ($news !== false) {
            $categories = $request->input('categories');
            if ($categories !== null) {
                $news->categories()->attach($categories);

                return \redirect()->route('admin.news.index')->with('success', 'News has been created');
            }
        }

        return \back()->with('error', ' News has not been create');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
