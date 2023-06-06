<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Post\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function Blog(){
        $blog=Post::all();
        return view('frontend.pages.blog',compact('blog'));
    }

    public function SinglePost($id){
        $post=Post::find($id);
        return view('frontend.pages.single_post',compact('post'));
    }












    public function English(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }

    public function Bangla(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','bangla');
        return redirect()->back();
    }
}
