<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {

        return \view('profile.index');
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    /*public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function update(Request $request ,User $user)
    {

         $data=$request->validate([
            'profile'=>['nullable','image','max:2024'],
            'name'=>'required|string|max:255',
             'email'=>['required','string','email','max:255',Rule::unique('users')->ignore(\auth()->user()->id)],
             'phone'=> ['required','string','max:255',Rule::unique('users')->ignore(\auth()->user()->id)]

        ]);
         if ($request->password){
             $data['password']=Hash::make($request->password);
         }else{
             unset($data['password']);
         }
         if ($request->hasFile('profile')){
             $file = $request->file('profile');
            $ext=$file->getClientOriginalExtension();
             $file_name =\auth()->user()->id.'_'.time().'.'.$ext;

             $file->storeAs('images/users', $file_name, 'public_files');
             $data['profile']=$file_name;
         }else{
             unset($data['profile']);
         }

        \auth()->user()->update(
            $data
        );
         session()->flash('status','ویرایش شد!');
         return back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
