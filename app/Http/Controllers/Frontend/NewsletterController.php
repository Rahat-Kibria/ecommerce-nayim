<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function NewsLetterView(){
        $newsletter=Newsletter::all();
        return view('admin.newsletter.newsletter_view',compact('newsletter'));
    }


    public function NewsletterStore(Request $request){

        $request->validate([
            'newsletter' => 'required|unique:newsletters|max:55',
        ]);
        $data=new Newsletter();
        $data->newsletter=$request->newsletter;
        $data->save();

        $notification = array(
            'message' => 'Thanks for Subscribing',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function NewsletterDelete($id){
        $data=Newsletter::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully Subscribing email deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
