<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function CuponView()
    {

        $cupon = Cupon::all();
        return view('admin.cupon.cupon_view', compact('cupon'));
    }

    public function CuponStore(Request $request)
    {
        $validated = $request->validate([
            'cupon' => 'required|unique:cupons|max:255',
            'discount' => 'required',
        ]);
        $data = new Cupon();
        $data->cupon = $request->cupon;
        $data->discount = $request->discount;
        $data->save();

        $notification = array(
            'message' => 'Succesfully Cupon Create',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CuponEdit($id)
    {
        $cupons = Cupon::find($id);
        return view('admin.cupon.cupon_edit', compact('cupons'));
    }

    public function CuponUpdate(Request $request, $id)
    {
        $data = Cupon::find($id);
        $data->cupon = $request->cupon;
        $data->discount = $request->discount;
        $data->save();

        $notification = array(
            'message' => 'Succesfully Cupon Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('cupon.view')->with($notification);
    }

    public function CuponDelete($id)
    {
        $data = Cupon::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Succesfully Cupon Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
