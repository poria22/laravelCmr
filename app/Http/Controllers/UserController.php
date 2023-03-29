<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderby('id','desc')->paginate(5);
        return view('panel.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.users.create');

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
           'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'phone'=> 'required|string|max:255|unique:users',
            'role'=>'required|string|max:255'
        ]);
        $user = User::create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'email' => $request->email,
            'role'=>$request->role,
            'password' => Hash::make('password'),
        ]);
        $request->session()->flash('status','کاربر به درستی ایجادشد!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('panel.users.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
            'phone'=> ['required','string','max:255',Rule::unique('users')->ignore($user->id)],
            'role'=>['required','string','max:255']
        ]);
        $user->update(
            $request->only('name','email','phone','role')
        );
        $request->session()->flash('status','کاربر آپدیت شد');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,User $user)
    {
        $user->delete();
        $request->session()->flash('status','کاربر حذف شد');
        return back();
    }
}
