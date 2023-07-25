<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Store;
use App\Http\Requests\News\Update;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\RedirectResponse;
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
    public function store(Store $request): RedirectResponse
    {


        $news = News::create($request->validated());
        if ($news) {
                $news->categories()->attach($request->getCategories());

                return \redirect()->route('admin.news.index')->with('success', 'News has been created');
        }

        return \back()->with('error', ' News has not been create');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $this->categoriesQueryBuilder->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, News $news): RedirectResponse
    {

        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategories());

            return \redirect()->route('admin.news.index')->with('success', 'News has been update');
        }

        return \back()->with('error', ' News has not been update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
