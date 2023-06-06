<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.index');
    }
    public function loginForm()
    {
        return view('auth.admin-login');
    }
    /**
     * Login check
     */
    public function verify(Request $request)
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
            return redirect()->route('admin.dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Check your login detail',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
    /**
     * logout
     */
    public function Logout()
    {
        session()->flush();
        Auth::logout();

        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.login')->with($notification);
    }
}
