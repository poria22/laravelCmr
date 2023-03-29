<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(5);
        $parents=Category::where('category_id',null)->get();
        return view('panel.categories.index',compact('parents' ,'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255', 'unique:categories'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        Category::create(
            $request->only(['name', 'link', 'category_id'])
        );

        session()->flash('status', 'دسته بندی مد نظر به درستی ایجاد شد!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parents=Category::where('category_id',null)->where('id', '!=' , $category->id)->get();

        return view('panel.categories.edit',compact('category' ,'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'category_id'=>['nullable','exists:categories,id']
        ]);
        $category->update(
            $request->only('name','category_id')
        );
        session()->flash('status','دسته بندی ویرایش شد');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Category $category)
    {
       $category->delete();
       session()->flash('status','دسته بندی حذف شد');
       return back();
    }
}
