<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\Timestamp;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $response = [];
        for ($i=0; $i<20; $i++)
        {
            $response[] = [
                'title' => fake()->jobTitle(),
//                'category_id' => ,
//                'source_id' => ,
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(),
                'description' => fake()->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $response;
    }
}
