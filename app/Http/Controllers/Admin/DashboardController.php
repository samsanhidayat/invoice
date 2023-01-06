<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProduct = Product::count();
        $totalUser = User::count();
        $totalCustomer = User::where('role', '0')->count();

        $date = Carbon::now()->format('d-m-Y');
        $dateMounth = Carbon::now()->format('m');
        $totalOrder = Order::count();
        $orderNow = Order::whereDate('created_at', $date)->count();
        $orderMount = Order::whereDate('created_at', $dateMounth)->count();

        return view('admin.dashboard', compact('totalProduct', 'totalUser', 'totalCustomer', 'totalOrder', 'orderNow', 'orderMount'));
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user), 'email'],
            'phone' => 'required|digits:12',
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
                'address' => $request->address
            ]
        );

        return redirect()->back()->with('message', 'User Profile Updated');
    }

    public function createPassword()
    {
        return view('admin.profile.change_password');
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
