<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class LandingController extends Controller
{
    public function index(Request $request)
    {

        $posts=Post::with('user')->orderBy('id','DESC')->paginate(4);
        return view('index',compact('posts'));
    }

    public function search(Request $request)
    {
        $posts=Post::where('title','LIKE','%'.$request->search.'%')->paginate(5);


        return view('index',compact('posts'));
    }
}
