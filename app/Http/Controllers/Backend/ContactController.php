<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Frontend\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.pages.contact');
    }

    public function ContactStore(Request $request)
    {
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();

        $notification = array(
            'message' => 'Succesfully Contact Information Send',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // search function

    public function Search(Request $request)
    {
        $search = $request->search;
        $product = DB::table('products')
            ->where('product_name', 'LIKE', "%$search%")
            ->paginate(20);
        return view('frontend.pages.search', compact('product'));
    }
}
