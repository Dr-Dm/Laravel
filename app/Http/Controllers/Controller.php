<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use function MongoDB\BSON\fromJSON;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getNews(int $category_id, int $id = null): array {

        $news = [];
        $quantityNews = 10;

        if ($id === null) {
            for ($i = 1; $i<$quantityNews; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'category_id' => $category_id,
                    'title' => \fake()->title(),
                    'description' => \fake()->text(),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H-i'),
                ];
            }

            return $news;
        }

        return [
            'id' => $id,
            'title' => \fake()->title,
            'description' => \fake()->text,
            'author' => \fake()->userName(),
            'created_at' => \now(),
        ];

    }

    public function getNewsCategories(int $category_id = null): array {
        $newsCategories = [];
        $newsCategoriesQuantity = 6;

        if ($category_id === null) {
            for ($i = 1; $i < $newsCategoriesQuantity; $i++) {
                $newsCategories [$i] = [
                    'id' => $i,
                    'category_title' => \fake()->jobTitle(),
                ];
            }

            return $newsCategories;
        }

        return $this->getNews($category_id);
    }
}
