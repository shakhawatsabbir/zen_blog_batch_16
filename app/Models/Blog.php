<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public static $blog, $image, $imagenewName, $imageUrl, $drictroy;
    use HasFactory;

    public static function saveBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = $request->author_id;
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeSlag($request);
        self::$blog->description = $request->description;
        self::$blog->image = self::saveImage($request);
        self::$blog->date = $request->date;
        self::$blog->blog_type = $request->blog_type;
        self::$blog->status = $request->status;
        self::$blog->save();
        return back();
    }

    public static function updateBlog($request)
    {
        self::$blog = Blog::find($request->blog_id);
        self::$blog ->category_id = $request->category_id;
        self::$blog ->author_id = $request->author_id;
        self::$blog ->title = $request->title;
        self::$blog ->slug = self::makeSlag($request);
        self::$blog ->description = $request->description;
        if ($request->file('image'))
        {
            if (self::$blog->image)
            {
                unlink(self::$blog->image);
            }
            self::$blog ->image = self::saveImage($request);
        }

        self::$blog ->date = $request->date;
        self::$blog ->blog_type = $request->blog_type;
        self::$blog ->status = $request->status;
        self::$blog ->save();
    }

    public static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imagenewName =rand().'.'. self::$image->getClientOriginalExtension();
        self::$drictroy ='admin/upload-image/blog-image/';
        self::$imageUrl =self::$drictroy.self::$imagenewName;
        self::$image->move(self::$drictroy,self::$imagenewName);
        return self::$imageUrl;
    }

    public static function makeSlag($request)
    {
        if($request->slag){
            $str = $request->slag;
            return preg_replace('/\s+/u','-',trim($str));
        }
        $str = $request->title;
        return preg_replace('/\s+/u','-',trim($str));
    }

}
