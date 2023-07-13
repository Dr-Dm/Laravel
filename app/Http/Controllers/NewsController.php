<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Queries\NewsQueryBuilder;


class NewsController extends Controller
{
    public function index(NewsQueryBuilder $newsQueryBuilder)
    {
        return view('news.index', ['news' => $newsQueryBuilder->getLastNews()]);
    }

    public function show(News $news)
    {

        return view('news.show', ['n' => $news]);
    }

}
