<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    public function AdminReturnRequest()
    {
        $order = DB::table('orders')->where('return_order', 1)->get();
        return view('admin.return.return_rquest', compact('order'));
    }

    public function AdminReturnRequestApprove($id)
    {
        DB::table('orders')->where('id', $id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Order Return Success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function AdminReturnAllRequest()
    {
        $order = DB::table('orders')->where('return_order', 2)->get();
        return view('admin.return.return_all_rquest', compact('order'));
    }
}
