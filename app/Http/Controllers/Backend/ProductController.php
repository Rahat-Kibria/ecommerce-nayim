<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function ProductView()
    {
        $product = Product::all();
        return view('admin.product.product_view', compact('product'));
    }


    public function ProductDetails($id)
    {
        $product = Product::find($id);
        return view('admin.product.product_details', compact('product'));
    }

    public function ProductAdd()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.product_add', compact('category', 'brand'));
    }

    public function ProductStore(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_quantity' => 'required',


        ]);

        if ($request->selling_price <= $request->discount_price) {
            $notification = array(
                'message' => 'Discount price should be less than selling price',
                'alert-type' => 'error'
            );
            return redirect('/admin/product/add')->with($notification);
        }

        $data = new Product();
        $data->product_name                 = $request->product_name;
        $data->product_code                 = $request->product_code;
        $data->product_quantity             = $request->product_quantity;
        $data->discount_price               = $request->discount_price;
        $data->category_id                  = $request->category_id;
        $data->subcategory_id               = $request->subcategory_id;
        $data->brand_id                     = $request->brand_id;
        $data->product_size                 = $request->product_size;
        $data->product_color                = $request->product_color;
        $data->selling_price                = $request->selling_price;
        $data->product_details              = $request->product_details;
        $data->video_link                   = $request->video_link;
        $data->main_slider                  = $request->main_slider;
        $data->hot_deal                     = $request->hot_deal;
        $data->buyone_getone                = $request->buyone_getone;
        $data->best_rated                   = $request->best_rated;
        $data->trend                        = $request->trend;
        $data->mid_slider                   = $request->mid_slider;
        $data->hot_new                      = $request->hot_new;
        $data->status                       = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;



        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('upload/product/' . $image_one_name);
            $data['image_one'] = 'upload/product/' . $image_one_name;
        }
        if ($image_two) {
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('upload/product/' . $image_two_name);
            $data['image_two'] = 'upload/product/' . $image_two_name;
        }

        if ($image_three) {
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('upload/product/' . $image_three_name);
            $data['image_three'] = 'upload/product/' . $image_three_name;
        }


        $data->save();



        $notification = array(
            'message' => 'Succesfully Product Insert',
            'alert-type' => 'success'
        );
        return redirect()->route('product.view')->with($notification);
    }

    public function ProductEdit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $subcategory = SubCategory::all();
        $brand = Brand::all();

        return view('admin.product.product_edit', compact('product', 'category', 'subcategory', 'brand'));
    }

    public function ProductUpdate(Request $request, $id)
    {
        if ($request->selling_price <= $request->discount_price) {
            $notification = array(
                'message' => 'Discount price should be less than selling price',
                'alert-type' => 'error'
            );
            return redirect('/admin/product/add')->with($notification);
        }

        $data = Product::find($id);
        $data->product_name                 = $request->product_name;
        $data->product_code                 = $request->product_code;
        $data->product_quantity             = $request->product_quantity;
        $data->discount_price               = $request->discount_price;
        $data->category_id                  = $request->category_id;
        $data->subcategory_id               = $request->subcategory_id;
        $data->brand_id                     = $request->brand_id;
        $data->product_size                 = $request->product_size;
        $data->product_color                = $request->product_color;
        $data->selling_price                = $request->selling_price;
        $data->product_details              = $request->product_details;
        $data->video_link                   = $request->video_link;
        $data->main_slider                  = $request->main_slider;
        $data->hot_deal                     = $request->hot_deal;
        $data->buyone_getone                = $request->buyone_getone;
        $data->best_rated                   = $request->best_rated;
        $data->trend                        = $request->trend;
        $data->mid_slider                   = $request->mid_slider;
        $data->hot_new                      = $request->hot_new;
        $data->status                       = 1;

        $img_one = $data->image_one;
        $img_two = $data->image_two;
        $img_three = $data->image_three;

        if ($request->file('image_one')) {
            $image_one = $request->file('image_one');
            @unlink($img_one);
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('upload/product/' . $image_one_name);
            $data['image_one'] = 'upload/product/' . $image_one_name;
        }
        if ($request->file('image_two')) {
            $image_two = $request->file('image_two');
            @unlink($img_two);
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('upload/product/' . $image_two_name);
            $data['image_two'] = 'upload/product/' . $image_two_name;
        }

        if ($request->file('image_three')) {
            $image_three = $request->file('image_three');
            @unlink($img_three);
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('upload/product/' . $image_three_name);
            $data['image_three'] = 'upload/product/' . $image_three_name;
        }

        $data->save();

        $notification = array(
            'message' => 'Succesfully Product Update',
            'alert-type' => 'success'
        );
        return redirect()->route('product.view')->with($notification);
    }

    public function ProductDelete($id)
    {

        $data = Product::find($id);
        $img_one = $data->image_one;
        $img_two = $data->image_two;
        $img_three = $data->image_three;
        unlink($img_one);
        unlink($img_two);
        unlink($img_three);
        $data->delete();

        $notification = array(
            'message' => 'Succesfully Product Delete',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Succesfully Product Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Succesfully Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function GetSubCategory($category_id)
    {
        $subcategory = SubCategory::where('category_id', $category_id)->get();
        return json_encode($subcategory);
    }
}
