<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public $category;
    public  function category()
    {
        return view('admin.category.category',[
            'categories'=>category::all()
        ]);
    }
    public function save(Request $request)
    {
        $this->category=category::saveCategory($request);
        return back();
    }
    public function edit($id)
    {
        $this->category =category::find($id);
        return view('admin.category.edit',[
            'category'=>$this->category
        ]);
    }
    public function editSave(Request $request)
    {
        $this->category=category::find($request->category_id);
        $this->category->category_name = $request->category_name;
        $this->category->status = $request->status;
        $this->category->save();
        return redirect(route('category'));
    }
    public function delete(Request $request)
    {
        $this->category =category::find($request->category_id);
        $this->category->delete();
        return redirect(route('category'));
    }
}
