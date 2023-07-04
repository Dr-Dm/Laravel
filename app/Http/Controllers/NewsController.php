<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $category_id) {
        $model = app(News::class);

        return view('news.index', ['news' => $model->getNews($category_id)]);
    }

    public function show(int $id) {
        $model = app(News::class);

        return view('news.show', ['n' => $model->getNewsById($id)]);
    }

}
