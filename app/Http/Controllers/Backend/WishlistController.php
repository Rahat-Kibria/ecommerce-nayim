<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function WishlistAdd($id){
        $userid=Auth::id();
        $check=Wishlist::where('user_id',$userid)->where('product_id',$id)->first();
        $data=new Wishlist();
        $data->user_id      =$userid;
        $data->product_id   =$id;

        if(Auth::check()){

            if($check){
                return response (['error' => 'Product  already has on your wishlist ']);

            }else{
                $data->save();
                return response (['success' => 'Add to wishlist']);

            }

        }else{
            return response (['error' => 'At first loing your account']);
        }
    }
}
