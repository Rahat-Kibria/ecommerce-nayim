<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display user registration page
     */
    public function create_auth_user()
    {
        return view('auth.register');
    }

    /**
     * Stores user info in database.
     */
    public function store_auth_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'auth_user'
        ]);

        $notification = array(
            'message' => 'User registered successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * User Login page.
     */
    public function user_login(Request $request)
    {
        return view('auth.login');
    }

    /**
     * User tries to login.
     */
    public function login_attempt(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $notification = array(
                'message' => 'Successfully Logged in',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Check your login detail',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * User attempts to logout.
     */
    public function Logout()
    {
        session()->flush();
        Auth::logout();

        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
