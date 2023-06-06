<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::all();
        return view('admin.category.category_view', compact('category'));
    }

    public function CategoryStore(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $data = new Category();
        $data->category_name = $request->category_name;
        $data->save();

        $notification = array(
            'message' => 'Succesfully Category Insert',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function CategoryEdit($id)
    {
        $updateCategory = Category::find($id);
        return view('admin.category.category_edit', compact('updateCategory'));
    }


    public function CategoryUpdate(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->save();

        $notification = array(
            'message' => 'Succesfully Category Update',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($notification);
    }



    public function CategoryDelete($id)
    {
        $data = Category::find($id);
        $data->delete();


        $notification = array(
            'message' => 'Succesfully Category deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
