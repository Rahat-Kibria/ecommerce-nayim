@extends('admin.admin_master')
@section('title')
View Order
@endsection

@section('content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order Details</h6>


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Order</strong> Details
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Type:</th>
                                    <th>{{ $order->payment_type }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Id:</th>
                                    <th>{{ $order->payment_id }}</th>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <th>{{ $order->total }} taka</th>
                                </tr>
                                <tr>
                                    <th>Month:</th>
                                    <th>{{ $order->month }} </th>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <th>{{ $order->date }} </th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Shipping</strong> Details
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $shippings->ship_name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $shippings->ship_phone }}</th>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <th>{{ $shippings->ship_email }}</th>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <th>{{ $shippings->ship_address }}</th>
                                </tr>
                                <tr>
                                    <th>City:</th>
                                    <th>{{ $shippings->city }}</th>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <th>
                                        @if ($order->status==0)
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif ($order->status==1)
                                        <span class="badge badge-success">Accepted</span>
                                        @elseif ($order->status==2)
                                        <span class="badge badge-info">In Progress</span>
                                        @elseif ($order->status==3)
                                        <span class="badge badge-success">Delivered</span>
                                        @else
                                        <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </th>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="card pd-20 pd-sm-40 col-lg-12">
                         <h6 class="card-body-title">Product Details

                         </h6>


                         <div class="table-wrapper">
                           <table class="table display responsive nowrap">
                             <thead>
                               <tr>
                                 <th class="wd-15p">Product ID</th>
                                 <th class="wd-15p">Product Name</th>
                                 <th class="wd-15p">Image</th>
                                 <th class="wd-15p">Color</th>
                                 <th class="wd-15p">Size</th>
                                 <th class="wd-15p">Quantity</th>
                                 <th class="wd-15p">Unit Price</th>
                                 <th class="wd-20p">Total</th>

                               </tr>
                             </thead>
                             <tbody>
                               @foreach($orderdetails as $row)
                               <tr>
                                 <td>{{ $row->product_code }}</td>
                                 <td>{{ $row->product_name }}</td>

                            <td> <img src="{{asset($row->image_one) }}" height="50px;" width="50px;"> </td>
                                <td>{{ $row->color }}</td>
                                <td>{{ $row->size }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ $row->singleprice }}</td>
                                <td>{{ $row->totalprice }}</td>

                               </tr>
                               @endforeach

                             </tbody>
                           </table>
                         </div><!-- table-wrapper -->
                       </div><!-- card -->

                </div>
                @if ($order->status==0)
                <a href="{{ route('payment.accept',['id'=>$order->id]) }}" class="btn btn-info">Accepted</a>
                <a href="{{ route('payment.cancel',['id'=>$order->id]) }}" class="btn btn-danger">Cancel Order </a>
                @elseif($order->status==1)
                <a href="{{ route('process.delivary',['id'=>$order->id]) }}" class="btn btn-info">Process Delivery </a>
                @elseif($order->status==2)
                <a href="{{ route('delivary.done',['id'=>$order->id]) }}" class="btn btn-success">Delivery Completed</a>
                @elseif($order->status==4)
                <strong class="text-center text-danger">This product is not valid</strong>
                @else
                <strong class="text-center text-success">This product has been successfully delivered</strong>
                @endif






        </div>




    </div>
</div>

@endsection
