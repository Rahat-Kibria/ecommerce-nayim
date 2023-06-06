<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OthersPageController extends Controller
{
    public function About(){
        return view('frontend.pages.about');
    }
}
