<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Ordercontroller extends Controller
{
    public function NewOrder()
    {
        $order = Order::where('status', 0)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function ViewOrder($id)
    {
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select('orders.*', 'users.name', 'users.phone')
            ->where('orders.id', $id)
            ->first();

        $shippings = DB::table('shippings')->where('order_id', $id)->first();
        // dd($shippings);

        $orderdetails = DB::table('order_details')
            ->join('products', 'order_details.product_id', 'products.id')
            ->select('order_details.*', 'products.product_code', 'products.image_one')
            ->where('order_details.order_id', $id)
            ->get();

        return view('admin.order.view_order', compact('order', 'shippings', 'orderdetails'));
    }

    public function PaymentAccept($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Payment Accept Done',
            'alert-type' => 'success'
        );
        return Redirect()->route('accept.payment')->with($notification);
    }

    public function PaymentCancel($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 4]);

        $notification = array(
            'message' => 'Order Cancel',
            'alert-type' => 'error'
        );
        return Redirect()->route('cancel.payment')->with($notification);
    }


    public function ProcessDelivary($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 2]);

        $notification = array(
            'message' => 'Sent to Delivary',
            'alert-type' => 'success'
        );
        return Redirect()->route('process.payment')->with($notification);
    }

    public function DelivaryDone($id)
    {

        // stock

        $product = DB::table('order_details')->where('order_id', $id)->get();
        foreach ($product as $product) {

            DB::table('products')->where('id', $product->product_id)
                ->update(['product_quantity' => DB::raw('product_quantity -' . $product->quantity)]);
        }
        // end stock



        DB::table('orders')->where('id', $id)->update(['status' => 3]);

        $notification = array(
            'message' => ' Delivary Done',
            'alert-type' => 'success'
        );
        return Redirect()->route('delivared.payment')->with($notification);
    }



    public function AcceptPayment()
    {

        $order = Order::where('status', 1)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function CancelPayment()
    {
        $order = Order::where('status', 4)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function ProcessPayment()
    {
        $order = Order::where('status', 2)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function DelivaredPayment()
    {
        $order = Order::where('status', 3)->get();
        return view('admin.order.pending', compact('order'));
    }
}
