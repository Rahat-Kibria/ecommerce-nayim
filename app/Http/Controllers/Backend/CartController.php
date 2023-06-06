<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();
        if ($product->discount_price == null) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response(['success' => 'Successfully added on your Cart']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response(['success' => 'Successfully added on your Cart']);
        }
    }

    public function ShowCart()
    {
        $cart = Cart::content();
        return view('frontend.pages.cart', compact('cart'));
    }

    public function CartRemove($id)
    {
        Cart::remove($id);
        $notification = array(
            'message' => 'Product Remove from  Cart ',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }

    public function CartItemUpdate(Request $request)
    {

        $rowId = $request->productid;
        $qty = $request->qty;
        Cart::update($rowId, $qty);

        $notification = array(
            'message' => 'Product Item updated successfully ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ModalCartView($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'sub_categories.subcategory_name', 'brands.brand_name')
            ->where('products.id', $id)
            ->first();

        $product_color = [];
        if ($product->product_color) {
            $color = $product->product_color;
            $product_color = explode(',', $color);
        }

        $product_size = [];
        if ($product->product_size) {
            $size = $product->product_size;
            $product_size = explode(',', $size);
        }

        return response([
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ]);
    }



    public function ModalCartInsert(Request $request)
    {

        $id = $request->product_id;
        $product = DB::table('products')->where('id', $id)->first();

        if ($product !== null) {
            $qty = $request->qty;

            $data = array();
            if ($product->discount_price == null) {
                // Add product to cart without discount price
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $qty;
                $data['price'] = $product->selling_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;

                if ($request->has('color')) {
                    $data['options']['color'] = $request->color;
                }

                if ($request->has('size')) {
                    $data['options']['size'] = $request->size;
                }

                Cart::add($data);

                $notification = array(
                    'message' => 'Product added successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                // Add product to cart with discount price
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $qty;
                $data['price'] = $product->discount_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;

                if ($request->has('color')) {
                    $data['options']['color'] = $request->color;
                }

                if ($request->has('size')) {
                    $data['options']['size'] = $request->size;
                }

                Cart::add($data);

                $notification = array(
                    'message' => 'Product added successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            // Handle the case when the product does not exist
            $notification = array(
                'message' => 'Product does not exist',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



    public function CheckOut()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('frontend.pages.checkout', compact('cart'));
        } else {

            $notification = array(
                'message' => 'At first login you account',
                'alert-type' => 'warning'
            );
            return redirect()->route('user.login')->with($notification);
        }
    }

    public function UserWishlist()
    {
        $userid = Auth::id();
        $product = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select('products.*', 'wishlists.id as wishlist_id', 'wishlists.user_id')
            ->where('wishlists.user_id', $userid)
            ->get();

        return view('frontend.pages.wishlist', compact('product'));
    }
    public function UserWishlistDelete($id)
    {
        $wishlist = DB::table('wishlists')->where('id', $id)->first();

        if ($wishlist) {
            DB::table('wishlists')->where('id', $id)->delete();
            $notification = array(
                'message' => 'Successfully deleted the wishlist item',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Wishlist item not found',
                'alert-type' => 'error'
            );
        }

        return redirect()->back()->with($notification);
    }



    public function UserCupon(Request $request)
    {
        $cupon = $request->cupon;
        $check = DB::table('cupons')->where('cupon', $cupon)->first();

        if ($check) {
            $totalAmount = Cart::subtotal();
            $discount = $check->discount;

            if ($discount <= $totalAmount) {
                Session::put('cupon', [
                    'name' => $check->cupon,
                    'discount' => $discount,
                    'balance' => $totalAmount - $discount,
                ]);

                $notification = [
                    'message' => 'Successfully Coupon Applied',
                    'alert-type' => 'success'
                ];
            } else {
                $notification = [
                    'message' => 'Discount amount is greater than the total amount',
                    'alert-type' => 'error'
                ];
            }

            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Invalid Coupon',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }


    public function CuponRemove()
    {
        Session::forget('cupon');

        $notification = array(
            'message' => ' Successfully Cupon Remove',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    //=============== payment method==========
    public function PaymentPage()
    {
        $cart = Cart::Content();
        return view('frontend.pages.payment', compact('cart'));
    }
}
