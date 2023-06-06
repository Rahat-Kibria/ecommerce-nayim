<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OderTrackingController extends Controller
{
    public function OrderTracking(Request $request)
    {

        $status_code = $request->code;
        $tracking = DB::table('orders')->where('status_code', $status_code)->first();
        if ($tracking) {
            return view('frontend.pages.tracking', compact('tracking'));
        } else {
            $notification = array(
                'message' => 'Status code invalid!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
