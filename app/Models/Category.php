<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

//    public function getCategories()
//    {
//        return DB::table($this->table)->get();
//    }
//
//    public function getCategoriesById(int $id): mixed
//    {
//        return DB::table($this->table)->find($id);
//    }

}
