<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brand = Brand::all();
        return view('admin.brand.brand_view', compact('brand'));
    }

    public function BrandStore(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required',
            'brand_log' => 'required',
        ]);

        $data = new Brand();
        $data->brand_name = $request->brand_name;

        if ($request->file('brand_log')) {
            $file = $request->file('brand_log');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/brand'), $filename);
            $data['brand_log'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Succesfully Brand Insert',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id)
    {
        $editbrand = Brand::find($id);
        return view('admin.brand.brand_edit', compact('editbrand'));
    }

    public function BrandUpdate(Request $request, $id)
    {

        $data = Brand::find($id);

        $data->brand_name = $request->brand_name;

        if ($request->file('brand_log')) {
            $file = $request->file('brand_log');
            @unlink(public_path('upload/brand/' . $data->brand_log));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/brand'), $filename);
            $data['brand_log'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Succesfully Brand Insert',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.view')->with($notification);
    }

    public function BrandUDelete($id)
    {
        $data = Brand::find($id);
        unlink(public_path('upload/brand/' . $data->brand_log));
        $data->delete();

        $notification = array(
            'message' => 'Succesfully Brand Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('brand.view')->with($notification);
    }
}
