<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\Panel\CreatePostRequest;
use Illuminate\Validation\ValidationException;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if(auth()->user()->role === 'author'){
            $postQuery=Post::where('user_id',auth()->user()->id)->with('user');
            if($request->search){
                $postQuery=Post::where('title','LIKE',"%{$request->search}%");
            }
            $posts=$postQuery->paginate(5);
        }else{
            $postQuery=Post::with('user');
            if($request->search){
                $postQuery=Post::where('title','LIKE',"%{$request->search}%");
            }
            $posts=$postQuery->paginate(5);
        }

        return view('panel.posts.index',compact('posts' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $categoryIds = Category::whereIn('name', $request->tags)->get()->pluck('id')->toArray();



        $file = $request->file('banner');

        $file_name = $file->getClientOriginalName();

        $file->storeAs('images/banners', $file_name, 'public_files');

        $data = $request->validated();
        $data['banner'] = $file_name;
        $data['user_id']=auth()->user()->id;

        $post = Post::create(
            $data
        );
        $post->categories()->sync($categoryIds);


        return redirect()->route('posts.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('panel.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'string'],
            'banner' => ['nullable', 'image'],
            'content' => ['required']
        ]);

        $categoryIds = Category::whereIn('name', $request->tags)->get()->pluck('id')->toArray();





        if($request->hasfile('banner')){
            $file = $request->file('banner');

            $file_name = $file->getClientOriginalName();

            $file->storeAs('images/banners', $file_name, 'public_files');}




        $post->update(
            $request->only('title','tags','banner','content')
        );
        $post->categories()->sync($categoryIds);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('status','پست مورد نظر پاک شد');
        return back();
    }
}
