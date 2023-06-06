@extends('frontend.frontend_master')
@section('content')
    @php
        $order = DB::table('orders')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
    @endphp
    @php
        $userdata = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
    @endphp

    <div class="contact_form pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="card col-md-8 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Payment Type</th>
                                <th>Payment Id</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Status Code</th>
                                {{-- <th >Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                                <tr>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>{{ $order->total }} Taka</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        @if ($order->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($order->status == 1)
                                            <span class="badge badge-success">Payment Accept</span>
                                        @elseif ($order->status == 2)
                                            <span class="badge badge-info">Pogress</span>
                                        @elseif ($order->status == 3)
                                            <span class="badge badge-success">Delivared</span>
                                        @else
                                            <span class="badge badge-danger">Cancel</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->status_code }}</td>
                                    {{-- <td>
                            <a href="" class="btn btn-primary">View</a>
                        </td> --}}

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <img src="{{ !empty($userdata->avater) ? url('upload/user_profile/' . $userdata->avater) : url('upload/no-image.jpg') }}"
                            alt="" class="card-img-top rounded" style="height: 90px; width:90px; margin-left:34%;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Auth::user()->name }}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('userpassword.change') }}">Password Change</a>
                            </li>
                            <li class="list-group-item"><a href="{{ route('updateuser.profile') }}">Edit Profile</a></li>
                            <li class="list-group-item"><a href="{{ route('return.order') }}">Return Order</a></li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-sm btn-block btn-danger ">Logout</a>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
