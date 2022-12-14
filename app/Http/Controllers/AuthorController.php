<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author;
class AuthorController extends Controller
{
    public $author;

    public function author()
    {
        return view('admin.author.author',[
            'authors'=>author::all()
        ]);
    }
    public function authorSave(Request $request)
    {
        $this->author = new author();
        $this->author->author_name = $request->author_name;
        $this->author->save();
        return back();
    }
    public function edit($id)
    {
        $this->author =author::find($id);
        return view('admin.author.edit',[
            'author'=>$this->author
        ]);
    }
    public function editSave(Request $request)
    {
        $this->author = author::find($request->author_id);
        $this->author->author_name=$request->author_name;
        $this->author->save();
        return redirect(route('author'));
    }
    public function delete(Request $request)
    {
        $this->author =author::find($request->author_id);
        $this->author->delete();
        return redirect(route('author'));
    }
}
