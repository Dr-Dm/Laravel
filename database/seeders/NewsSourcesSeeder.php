<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news_sources')->insert($this->getData());
    }

    public function getData():array
    {
        $response = [];
        for ($i=0; $i<30; $i++)
        {
            $response[] = [
                'news_link' => fake()->url(),
            ];
        }
        return $response;
    }
}
