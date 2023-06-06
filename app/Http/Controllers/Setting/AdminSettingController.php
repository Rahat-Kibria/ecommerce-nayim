<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Setiing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSettingController extends Controller
{
    public function ChangePassword()
    {
        return view('admin.setting.pass_update');
    }


    public function ChangePassStore(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashpassword = User::find(1)->password;
        if (Hash::check($request->oldpassword, $hashpassword)) {
            $user = User::find(1);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Successfully Update Password',
                'alert-type' => 'success'
            );

            return redirect()->route('login')->with($notification);
        } else {
            return redirect()->back();
        }
    }


    public function getSetting()
    {

        $setting = Setiing::first();
        return view('admin.setting.update', compact('setting'));
    }

    public function updateSetting(Request $request, $id)
    {

        $setting = Setiing::find($id);
        $setting->vat = $request->vat;
        $setting->shipping_charge = $request->shipping_charge;
        $setting->shopname = $request->shopname;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;


        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path('upload/site/' . $setting->logo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/site'), $filename);
            $setting['logo'] = $filename;
        }
        $setting->save();

        $notification = array(
            'message' => 'Successfully Update Site',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function adminprofile()
    {

        $adminProfile = User::first();
        return view('admin.setting.admin_profile', compact('adminProfile'));
    }

    public function updateadminprofile(Request $request, $id)
    {

        $admin = User::find($id);

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin/' . $admin->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin'), $filename);
            $admin['profile_photo_path'] = $filename;
        }
        $admin->save();

        $notification = array(
            'message' => 'Successfully Update ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
