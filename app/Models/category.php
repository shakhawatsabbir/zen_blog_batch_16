<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public static $category;
    use HasFactory;

    public static function saveCategory($request)
    {
        self::$category = new category();
        self::$category->category_name = $request->category_name;
        self::$category->save();
    }
}
