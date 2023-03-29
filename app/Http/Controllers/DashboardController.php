<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\comment;
use App\Models\Category;
class DashboardController extends Controller
{
    public function index(Request $request){

        $count_post=Post::count();
        $count_category=Category::count();
        $count_comment=comment::count();
        $count_user=User::count();
        if (auth()->user()->role !== 'admin'){
            $count_post=Post::where('user_id','=',auth()->user()->id)->count();
            $count_comment=comment::wherehas('post',function ($query){
                return $query->where('user_id','='.auth()->user()->id);
            })->count();
        }

        return view('panel.index',compact('count_post','count_category','count_comment','count_user'));
    }
}
