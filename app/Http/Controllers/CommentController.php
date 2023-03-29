<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->approved)){

            $comments=comment::with(['user','post'])->withCount('replies')->where('approved','=',$request->approved)->paginate(5);
        }else{
            $comments=comment::with(['user','post'])->withCount('replies')->paginate(5);
        }

        return view('panel.comments.index' ,compact('comments'));
    }

    public function store(Request $request)
    {

        $data= $request->validate([

           'matn'=> ['required'],
            'post_id'=>['required','exists:posts,id']

        ]);
        $data['user_id']=auth()->user()->id;
        $data['content']=$request->matn;

        comment::create($data);

        return back();

    }

    public function update(comment $comment)
    {
        $comment->update([
            'approved' =>! $comment->approved
        ]);
         return back();

    }


    public function destroy(comment $comment)
    {

        $comment->delete();
        session()->flash('status' , 'نظر حذف شد!');
        return back();
    }
}
