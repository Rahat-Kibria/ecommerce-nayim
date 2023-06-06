
@extends('frontend.frontend_master')
@section('content')
@include('frontend.pages.header')

<style>
    /**
   * The CSS shown here will not be introduced in the Quickstart guide, but shows
   * how you can use CSS to style your Element's container.
   */
  .StripeElement {
    box-sizing: border-box;

    height: 40px;
    width: 100%;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }

  </style>









<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('forntend/styles/contact_responsive.css') }}">


@php
    $setting=DB::table('setiings')->first();
    $charge=$setting->shipping_charge;
    $vat=$setting->vat;
    $cart=Cart::Content();
@endphp

  <div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-7  rounded p-3 "style="border:2px solid #0984e3">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Cart Products</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($cart as $cart )
                            <li class="cart_item clearfix">

                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Image</div>
                                        <div class="cart_item_text">
                                            <img src="{{ asset($cart->options->image) }}" alt="" style="width:70px; height:70px">
                                        </div>
                                    </div>

                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title ">Name</div>
                                        <div class="cart_item_text">{{ $cart->name }}</div>
                                    </div>

                                    @if ($cart->options->color==null)
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text">{{ $cart->options->color }}</div>
                                    </div>
                                    @endif

                                    @if ($cart->options->size==null)
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
                                        <div class="cart_item_text">৳{{ $cart->price *  $cart->qty }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div>
                                        <div class="cart_item_text">
                                            <a href="{{ route('cart.remove',['id'=>$cart->rowId]) }}" class="btn btn-sm btn-danger">x</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <ul class="list-group col-md-4" style="float:right;">
                        @if (Session::has('cupon'))
                        <li class="list-group-item">Sub Total: <span style="float:right;">৳{{ Session::get('cupon')['balance'] }}</span></li>
                        <li class="list-group-item">Cupon: <span class="badge badge-primary">{{ Session::get('cupon')['name'] }}
                        {{-- <a href="{{ route('cupon.remove') }}" class="btn btn-sm btn-danger">x</a> --}}
                        </span> <span style="float:right;">{{ Session::get('cupon')['discount'] }}</span></li>
                        @else
                        <li class="list-group-item">Sub Total: <span style="float:right;">৳{{Cart::subtotal() }}</span></li>

                        @endif

                        <li class="list-group-item">Shipping Charge: <span style="float:right;">৳{{ $charge }}</span></li>
                        <li class="list-group-item">Vat: <span style="float:right;">৳{{ $vat }}</span></li>

                        @if (Session::has('cupon'))
                        <li class="list-group-item">Total: <span style="float:right;">৳{{ Session::get('cupon')['balance'] +$charge +$vat }}</span></li>
                        @else
                        <li class="list-group-item">Total: <span style="float:right;">{{ Cart::total()+ $charge +$vat}}</span></li>
                        @endif

                    </ul>


                </div>
            </div>


            <div class="col-lg-5 rounded" style="border:2px solid #0984e3; padding: 20px;">
                <div class="contact_form_container">

        <form action="{{ route('on.cash') }}" method="post" id="payment-form">
          @csrf
          <div class="form-row">
            <label for="card-element">
             <img src="{{ asset('frontend/images/cashon.jpg') }}" alt="" style="width: 200px;">
            </label>
            <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
          </div><br>

  <input type="hidden" name="shipping" value="{{ $charge }} ">
   <input type="hidden" name="vat" value="{{ $vat }} ">
   <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + $vat }} ">

<input type="hidden" name="ship_name" value="{{ $data['name'] }} ">
<input type="hidden" name="ship_phone" value="{{ $data['phone'] }} ">
<input type="hidden" name="ship_email" value="{{ $data['email'] }} ">
<input type="hidden" name="ship_address" value="{{ $data['address'] }} ">
<input type="hidden" name="ship_city" value="{{ $data['city'] }} ">
<input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">




          <button class="btn btn-info">Submit</button>
        </form>


                </div>
            </div>

        </div>
    </div>
    <div class="panel"></div>
</div>



@endsection
