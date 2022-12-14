<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\category;
use App\Models\author;
use DB;

class BlogController extends Controller
{
    public $blog, $image, $imagenewName, $imageUrl, $drictroy;
    public function index()
    {
        return view('admin.blog.blog',[
            'categories'=>category::all(),
            'authors'=>author::all(),
        ]);
    }
    public function save(Request $request)
    {
        Blog::saveBlog($request);
        return back();
    }


    public function manageBlog()
    {

        return view('admin.blog.manage',[
            'blogs'=>DB::table('blogs')
                ->join('categories','blogs.category_id','=','categories.id')
                ->join('authors','blogs.author_id','=','authors.id')
                ->select('blogs.*','categories.category_name','authors.author_name')
                ->get()
        ]);
    }

    public function edit($id){
        return view('admin.blog.edit',[
            'categories'=>category::all(),
            'authors'=>author::all(),
            'blog' => Blog::find($id)
        ]);
    }

    public function update(Request $request)
    {
        Blog::updateBlog($request);
        return redirect(route('manage.blog'));
    }

    public  function editStatus($id)
    {
        $this->blog =Blog::find($id);
        if ($this->blog->status == 1) {
            $this->blog->status =0;
            $this->blog->save();
        }
        else {
            $this->blog->status =1;
            $this->blog->save();
        }
        return back();
    }

    public function delete(Request $request)
    {
        $this->blog = Blog::find($request->blog_id);
        if ($this->blog->image)
        {
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return back();
    }
}
