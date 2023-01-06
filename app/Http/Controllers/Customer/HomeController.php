<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user), 'email'],
            'phone' => 'required|digits:12',
            'pincode' => 'required|digits:6',
            'address' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'phone' => $request->phone,
                'address' => $request->address,
                'pincode' => $request->pincode
            ]
        );

        return redirect()->back()->with('message', 'User Profile Updated');
    }

    public function createPassword()
    {
        return view('frontend.password.create_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}