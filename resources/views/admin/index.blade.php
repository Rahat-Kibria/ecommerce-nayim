@extends('admin.admin_master')

@section('title')
    Admin||Home
@endsection

@section('content')
    @php
        $date = date('d-m-y');
        $today = DB::table('orders')
            ->where('date', $date)
            ->sum('total');
        
        $month = date('F');
        $month = DB::table('orders')
            ->where('month', $month)
            ->sum('total');
        
        $year = date('Y');
        $year = DB::table('orders')
            ->where('year', $year)
            ->sum('total');
        
        $delivary = DB::table('orders')
            ->where('status', 3)
            ->where('date', $date)
            ->sum('total');
        $return = DB::table('orders')
            ->where('return_order', 2)
            ->get();
        $product = DB::table('products')->get();
        $brand = DB::table('brands')->get();
        $user = DB::table('users')->get();
        
    @endphp
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $today }}৳</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $month }}৳</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $year }}৳</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Deliveries</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $delivary }}৳</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->

            <div class="row row-sm mt-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:red">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Returns</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($return) }} Products</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Products</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($product) }} Products</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Brands</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($brand) }} Brands</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 rounded "
                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;background-color:#82ccdd">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-14 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Users</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="sparkline2"><img src="{{ asset('backend/img/sales.png') }}" alt=""
                                    style="width:60px"></span>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($user) }} Persons</h3>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->
        </div>
    </div><!-- sl-pagebody -->
    {{-- @include('admin.includes.footer') --}}
    </div><!-- sl-mainpanel -->
@endsection
