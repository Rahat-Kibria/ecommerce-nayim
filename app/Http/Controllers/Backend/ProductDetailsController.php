<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductDetailsController extends Controller
{
    public function ProductDetails($id, $product_name)
    {
        $product = Product::find($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return view('frontend.pages.product_details', compact('product', 'product_color', 'product_size'));
    }


    public function ProducAdd(Request $request, $id)
    {

        $product = DB::table('products')->where('id', $id)->first();

        $data = array();
        if ($product->discount_price == null) {

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            $notification = array(
                'message' => 'Product Successfully Added',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {


            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            $notification = array(
                'message' => 'Product Successfully Added',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }


    //============ subcategory ==========
    public function SubcategoryProduct($id)
    {

        $headsubcate = DB::table('sub_categories')->where('id', $id)->get();

        $product = DB::table('products')->where('subcategory_id', $id)->paginate(10);
        $category = Category::all();
        $brand = DB::table('products')->where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();

        return view('frontend.pages.all_product', compact('product', 'category', 'brand', 'headsubcate'));
    }

    // ============category =========

    public function CategoryProduct($id)
    {
        $headcate = DB::table('categories')->where('id', $id)->get();
        $product = DB::table('products')->where('category_id', $id)->paginate(5);
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.pages.all_category', compact('product', 'category', 'brand', 'headcate'));
    }
}
