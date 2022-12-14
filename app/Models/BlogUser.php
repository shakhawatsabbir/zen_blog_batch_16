<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    private static $user;
    public static function newUser($request)
    {
        self::$user = new BlogUser();
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->phone = $request->phone;
        self::$user->password =bcrypt($request->password) ;
        self::$user->save();
    }

    use HasFactory;
}
