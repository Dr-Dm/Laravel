<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $category_id) {
        //return dd('news.index', ['news' => $this->getNews($category_id)]);
        return view('news.index', ['news' => $this->getNews($category_id)]);
    }

    public function show(int $id) {
        return view('news.show', ['n' => $this->getNews(null, $id)]);
    }

}
