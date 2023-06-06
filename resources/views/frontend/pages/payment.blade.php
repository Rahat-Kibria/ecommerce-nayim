@extends('frontend.frontend_master')
@section('content')
    @include('frontend.pages.header')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('forntend/styles/contact_responsive.css') }}">

    @php
        $setting = DB::table('setiings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
    @endphp

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7  rounded p-3 "style="border:2px solid #0984e3">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Cart Products</div>

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $cart)
                                    <li class="cart_item clearfix">

                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Image</div>
                                                <div class="cart_item_text">
                                                    <img src="{{ asset($cart->options->image) }}" alt=""
                                                        style="width:70px; height:70px">
                                                </div>
                                            </div>

                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title ">Name</div>
                                                <div class="cart_item_text">{{ $cart->name }}</div>
                                            </div>

                                            @if ($cart->options->color == null)
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">{{ $cart->options->color }}</div>
                                                </div>
                                            @endif

                                            @if ($cart->options->size == null)
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $cart->options->size }}</div>
                                                </div>
                                            @endif


                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">{{ $cart->qty }}</div>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">৳{{ $cart->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">৳{{ $cart->price * $cart->qty }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text">
                                                    <a href="{{ route('cart.remove', ['id' => $cart->rowId]) }}"
                                                        class="btn btn-sm btn-danger">x</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <ul class="list-group col-md-4" style="float:right;">
                            @if (Session::has('cupon'))
                                <li class="list-group-item">Sub Total: <span
                                        style="float:right;">৳{{ Session::get('cupon')['balance'] }}</span></li>
                                <li class="list-group-item">Cupon: <span
                                        class="badge badge-primary">{{ Session::get('cupon')['name'] }}

                                    </span> <span style="float:right;">{{ Session::get('cupon')['discount'] }}</span></li>
                            @else
                                <li class="list-group-item">Sub Total: <span
                                        style="float:right;">৳{{ Cart::subtotal() }}</span></li>
                            @endif

                            <li class="list-group-item">Shipping Charge: <span
                                    style="float:right;">৳{{ $charge }}</span></li>
                            <li class="list-group-item">Vat: <span style="float:right;">৳{{ $vat }}</span></li>

                            @if (Session::has('cupon'))
                                <li class="list-group-item">Total: <span
                                        style="float:right;">৳{{ Session::get('cupon')['balance'] + $charge + $vat }}</span>
                                </li>
                            @else
                                <li class="list-group-item">Total: <span
                                        style="float:right;">{{ Cart::total() + $charge + $vat }}</span></li>
                            @endif

                        </ul>

                    </div>
                </div>


                <div class="col-lg-5  rounded p-3"style="border:2px solid #0984e3">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>

                        <form method="POST" action="{{ route('payment.process') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text"class="form-control" id="name" name="name"
                                    placeholder="Enter your Full Name" required="">
                                @error('name')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number"class="form-control" id="phone" name="phone"
                                    placeholder="Enter your Phone Number" required="">
                                @error('phone')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email"class="form-control" id="email" name="email"
                                    placeholder="Enter your Email" required="">
                                @error('email')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"class="form-control" id="address" name="address"
                                    placeholder="Enter your Address" required="">
                                @error('address')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text"class="form-control" id="city" name="city"
                                    placeholder="Enter your City" required="">
                                @error('city')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="contact_form_title text-center">Payment By </div>
                            <div class="form-group">
                                <ul class="logos_list">

                                    <li><input type="radio" name="payment" id="" value="oncash" required>
                                        <img src="{{ asset('frontend/images/cashon.jpg') }}" alt="Cash on delivery"
                                            style="width:100px;height:60px; ">
                                    </li>
                                    <li><input type="radio" name="payment" id="" value="stripe" required>
                                        <img src="{{ asset('frontend/images/stripe.png') }}" alt="Stripe Payment"
                                            style="width:100px;height:60px; ">
                                    </li>

                                </ul>
                            </div>

                            <div class="contact_form_button text-center">
                                <button type="submit" class="button contact_submit_button">Order Place</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
