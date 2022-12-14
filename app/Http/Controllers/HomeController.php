<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\category;
use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public $user;

    public function index()
    {
        $latestblogs =DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->select('blogs.*','categories.category_name')
            ->where('blogs.status',1)
            ->where('blog_type','latest')
//            ->orderby('blogs.id','asc')
            ->orderby('blogs.id','desc')
            ->take(3)
//                ->skip(1)
            ->get();

        $trendingblogs =DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->select('blogs.*','categories.category_name')
            ->where('blogs.status',1)
            ->where('blog_type','trending')
//            ->orderby('blogs.id','asc')
            ->orderby('blogs.id','desc')
            ->take(5)
//                ->skip(1)
            ->get();
        $populerblogs =DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->select('blogs.*','categories.category_name')
            ->where('blogs.status',1)
            ->where('blog_type','popular')
//            ->orderby('blogs.id','asc')
            ->orderby('blogs.id','desc')
            ->take(3)
//                ->skip(1)
            ->get();
        $cultureblogs =DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->select('blogs.*','categories.category_name')
            ->where('blogs.status',1)
            ->where('category_name','culture')
//            ->orderby('blogs.id','asc')
            ->orderby('blogs.id','desc')
            ->take(1)
//                ->skip(1)
            ->get();

        return view('frontEnd.home.home',[
            'latestblogs'=> $latestblogs,
            'trendingblogs'=> $trendingblogs,
            'populerblogs'=> $populerblogs,
            'cultureblogs'=> $cultureblogs,
        ]);
    }

    public function blogDetails($slug)
    {
        return view('frontEnd.blog.blog-details',[

            'blogs'=> DB::table('blogs')
                ->join('categories','blogs.category_id','categories.id')
                ->join('authors','blogs.author_id','authors.id')
                ->select('blogs.*','categories.category_name','authors.author_name')
                ->where('blogs.slug',$slug)
                ->first()
        ]);
    }
    public function category($categoryId)
    {
        $category=category::where('id',$categoryId)->first();

        $blogs= DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.category_id',$categoryId)
            ->get();
        return view('frontEnd.category.category',[
            'blogs'=>$blogs,
            'category'=>$category
        ]);
    }
    public function aboutDetails()
    {
        return view('frontEnd.about.about-details');
    }
    public function contact()
    {
        return view('frontEnd.contact.contact');
    }

    public function userReg()
    {
        return view('frontEnd.user.user-register');
    }
    public function saveUser(Request $request)
    {
        BlogUser::newUser($request);
        return back();
    }

    public function userLogin()
    {
        return view('frontEnd.user.user-login');
    }
    public function LoginCheck(Request $request)
    {
        $userInfo = BlogUser::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();
        if ($userInfo){
            $exPassword = $userInfo->password;
            if (password_verify($request->password,$exPassword )){
                Session::put('userId',$userInfo->id);
                Session::put('userName',$userInfo->name);
                return redirect('/');
            }
            else{
                return back()->with('massage','Please input Your valid Password');
            }
        }
        else{
            return back()->with('massage','Please input Your right User Name');
        }
    }
    public function logout()
    {
        Session::forget('userId');
        Session::forget('userName');
        return back();
    }

    public function userProfile($id)
    {

        if ($id == Session::get('userId'))
        {
            return view('frontEnd.user.profile',[
                'user' => BlogUser::find($id)
            ]);
        }
        else{
            return redirect('/');
        }

    }
}
