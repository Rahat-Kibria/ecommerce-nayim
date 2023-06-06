@extends('frontend.frontend_master')
@section('title')
    Home| Page
@endsection
@section('content')
    @include('frontend.pages.header')
    @include('frontend.pages.banner')
    @php

    $featured = DB::table('products')
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();

    $trend = DB::table('products')
        ->where('status', 1)
        ->where('trend', 1)
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();

    $bestrated = DB::table('products')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->select('products.*', 'brands.brand_name')
        ->where('products.status', 1)
        ->where('best_rated', 1)
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();

    $hotdeal = DB::table('products')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->select('products.*', 'brands.brand_name')
        ->where('products.status', 1)
        ->where('hot_deal', 1)
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();

    @endphp


    <div class="characteristics" style="background-color: rgba(87, 101, 116,0.1)">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start"
                        style="background-color: white">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start"
                        style="background-color: white">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start"
                        style="background-color: white">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start"
                        style="background-color: white">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured" id="featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">

                                @foreach ($hotdeal as $hotdeal)
                                    <!-- Deals Item -->
                                    <div class="owl-item deals_item">
                                        <div class="deals_image">
                                            <a href="{{ url('product/details/' . $hotdeal->id . '/' . $hotdeal->product_name) }}">
                                                <img src="{{ asset($hotdeal->image_one) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category"><a
                                                        href="">{{ $hotdeal->brand_name }} by</a></div>
                                                @if ($hotdeal->discount_price == null)
                                                @else
                                                    <div class="deals_item_price ml-auto"><s
                                                            style="color: gray !important; font-size:20px;">৳{{ $hotdeal->selling_price }}</s>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name">
                                                    @if($hotdeal->product_quantity<=0)
                                                    <span class="badge badge-danger">Stock out</span>
                                                    @else
                                                    @endif
                                                    <a href="{{ url('product/details/' . $hotdeal->id . '/' . $hotdeal->product_name) }}">{{ $hotdeal->product_name }}</a>
                                                </div>
                                                @if ($hotdeal->discount_price == null)
                                                    <div class="deals_item_price ml-auto" style="color:gray !important; ">
                                                        ৳{{ $hotdeal->selling_price }}</div>
                                                @else
                                                @endif

                                                @if ($hotdeal->discount_price != null)
                                                    <div class="deals_item_price ml-auto">৳{{ $hotdeal->discount_price }}
                                                    </div>
                                                @else
                                                @endif

                                            </div>
                                           
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                            </div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">

                                    @foreach ($featured as $featured)
            
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <a
                                                        href="{{ url('product/details/' . $featured->id . '/' . $featured->product_name) }}">
                                                        <img src="{{ asset($featured->image_one) }}" alt=""
                                                            style="height:120px; width:140px;">
                                                    </a>
                                                </div>
                                                <div class="product_content ">
                                                    @if ($featured->discount_price == null)
                                                        <div class="product_price discount">
                                                            ৳{{ $featured->selling_price }}</div>
                                                    @else
                                                        <div class="product_price discount">
                                                            ৳{{ $featured->discount_price }}<span><s>৳{{ $featured->selling_price }}</s></span>
                                                        </div>
                                                    @endif

                                                 
                                                   @php
                                                   $less=DB::table('order_details')->first();
                                                   @endphp
                                                    <div class="product_name">
                                                       @if($featured->product_quantity<=0)
                                                    <span class="badge badge-danger">Stock out</span>
                                                    @else
                                                    @endif
                                                        
                                                        <div>
                                                            <a
                                                                href="{{ url('product/details/' . $featured->id . '/' . $featured->product_name) }}">{{ $featured->product_name }}</a>
                                                        </div>
                                                    </div>

                                                        {{-- <div class="product_extras">
                                                            <button class="product_cart_button  addcart"data-id="{{$featured->id}}">Add to Cart</button>
                                                        </div> --}}

                                                    <div class="product_extras">
                                                        @if($featured->product_quantity<=0)
                                                        <button
                                                            class="product_cart_button">StockOut Product</button>
                                                        @else
                                                        <button id="{{ $featured->id }}"
                                                            class="product_cart_button addcart" data-toggle="modal"
                                                            data-target="#cartmodal" onclick="productview(this.id)">Add to
                                                            Cart</button>
                                                        @endif
                                                       
                                                    </div>

                                                </div>
                                                <a class="addwishlist" data-id="{{ $featured->id }}">
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                </a>
                                                <ul class="product_marks">
                                                    @if ($featured->discount_price == null)
                                                        <li class="product_mark product_discount"
                                                            style="background:rgb(9, 95, 224);">new</li>
                                                    @else
                                                        <li class="product_mark product_discount">
                                                            @php
                                                                $amount = $featured->selling_price - $featured->discount_price;
                                                                $discount = ($amount / $featured->selling_price) * 100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories" style="background:rgba(218, 245, 245, 0.1)">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i
                                    class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i
                                    class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container" style="background:white;">
                        <div class="owl-carousel owl-theme popular_categories_slider">
                            @php
                                $category = DB::table('categories')->get();
                            @endphp

                            @foreach ($category as $category)
                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div
                                        class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img
                                                src="{{ asset('frontend/images/category.png') }}" alt="">
                                        </div>
                                        <div class="popular_category_text" style="font-size:16px">
                                            {{ $category->category_name }}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background"
            style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">
                @php
                    $midslider = DB::table('products')
                        ->join('categories', 'products.category_id', 'categories.id')
                        ->join('brands', 'products.brand_id', 'brands.id')
                        ->select('products.*', 'brands.brand_name', 'categories.category_name')
                        ->where('status', 1)
                        ->where('mid_slider', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)
                        ->get();
                @endphp

                @foreach ($midslider as $midslider)
                    <!-- Banner 2 Slider Item -->
                    <div class="owl-item">
                        <div class="banner_2_item">
                            <div class="container fill_height">
                                <div class="row fill_height">
                                    <div class="col-lg-4 col-md-6 fill_height">
                                        <div class="banner_2_content">
                                            <div class="banner_2_category" style="font-size: 20px">
                                                {{ $midslider->category_name }}</div>
                                            <div class="banner_2_title"style="font-size: 40px">
                                                {{ $midslider->product_name }}</div>
                                            <div class="banner_2_text">{{ $midslider->brand_name }}
                                                <br>
                                                @if ($midslider->discount_price == null)
                                                    <h3> ৳{{ $midslider->selling_price }}</h3>
                                                @else
                                                    <div class="d-flex">
                                                        <h3 class="mr-3"> ৳{{ $midslider->discount_price }}</h3>
                                                        <h3> <s>৳{{ $midslider->selling_price }}</s></h3>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="button banner_2_button"><a
                                                    href="{{ url('product/details/' . $midslider->id . '/' . $midslider->product_name) }}">Explore</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8 col-md-6 fill_height">
                                        <div class="banner_2_image_container">
                                            <div class="banner_2_image"><img src="{{ asset($midslider->image_one) }}"
                                                    alt="" style="width: 400px; height:400px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Hot New category one -->
    @php
    $category = DB::table('categories')->first();
    $catid = $category?->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get();
    @endphp


    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $category?->category_name }}</div>
                            <div class=""style="float:right"><a
                                    href="{{ route('category.product', ['id' => $category?->id]) }}">View All</a></div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($product as $products)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a
                                                            href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">
                                                            <img src="{{ asset($products->image_one) }}" alt=""
                                                                style="height:120px; width:140px;">
                                                        </a>
                                                    </div>
                                                    <div class="product_content ">
                                                        @if ($products->discount_price == null)
                                                            <div class="product_price discount">
                                                                ৳{{ $products->selling_price }}</div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ৳{{ $products->discount_price }}<span><s>৳{{ $products->selling_price }}</s></span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            @if($products->product_quantity<=0)
                                                            <span class="badge badge-danger">Stock out</span>
                                                            @else
                                                            @endif
                                                            
                                                            <div><a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">{{ $products->product_name }}</a>
                                                            </div>
                                                        </div>

                                                        <div class="product_extras">

                                                            @if($products->product_quantity<=0)
                                                            <button
                                                                class="product_cart_button">StockOut Product</button>
                                                            @else
                                                            <button id="{{ $products->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Add to
                                                                Cart</button>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                    <a class="addwishlist" data-id="{{ $products->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </a>
                                                    <ul class="product_marks">
                                                        @if ($products->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background:rgb(9, 95, 224);">new</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $products->selling_price - $products->discount_price;
                                                                    $discount = ($amount / $products->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end Hot New category one --}}

    {{-- hot new category two --}}
    @php
    $category = DB::table('categories')
        ->skip(1)
        ->first();
    $catid = $category?->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get();
    @endphp

    <div class="new_arrivals pt-0"style="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $category?->category_name }}</div>
                            <div class=""style="float:right"><a
                                    href="{{ route('category.product', ['id' => $category?->id]) }}">View All</a>
                            </div>

                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($product as $products)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a
                                                            href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">
                                                            <img src="{{ asset($products->image_one) }}" alt=""
                                                                style="height:120px; width:140px;">
                                                        </a>
                                                    </div>
                                                    <div class="product_content ">
                                                        @if ($products->discount_price == null)
                                                            <div class="product_price discount">
                                                                ৳{{ $products->selling_price }}</div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ৳{{ $products->discount_price }}<span><s>৳{{ $products->selling_price }}</s></span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            @if($products->product_quantity<=0)
                                                            <span class="badge badge-danger">Stock out</span>
                                                            @else
                                                            @endif
                                                            <div><a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">{{ $products->product_name }}</a>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="product_extras"> --}}
                                                        {{-- <div class="product_color"> --}}
                                                        {{-- <input type="radio" checked name="product_color" style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999"> --}}
                                                        {{-- </div> --}}
                                                        {{-- <button class="product_cart_button">Add to Cart</button> --}}
                                                        {{-- </div> --}}
                                                        <div class="product_extras">
                                                            @if($products->product_quantity<=0)
                                                            <button
                                                                class="product_cart_button">StockOut Product</button>
                                                            @else
                                                            <button id="{{ $products->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Add to
                                                                Cart</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <a class="addwishlist" data-id="{{ $products->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </a>
                                                    <ul class="product_marks">
                                                        @if ($products->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background:rgb(9, 95, 224);">new</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $products->selling_price - $products->discount_price;
                                                                    $discount = ($amount / $products->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end  hot new category two --}}

    {{-- hot new category three --}}
    @php
    $category = DB::table('categories')
        ->skip(2)
        ->first();
    $catid = $category?->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get();
    @endphp

    <div class="new_arrivals pt-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $category?->category_name }}</div>
                            <div class=""style="float:right"><a
                                href="{{ route('category.product', ['id' => $category?->id]) }}">View All</a>
                        </div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($product as $products)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a
                                                            href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">
                                                            <img src="{{ asset($products->image_one) }}" alt=""
                                                                style="height:120px; width:140px;">
                                                        </a>
                                                    </div>
                                                    <div class="product_content ">
                                                        @if ($products->discount_price == null)
                                                            <div class="product_price discount">
                                                                ৳{{ $products->selling_price }}</div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ৳{{ $products->discount_price }}<span><s>৳{{ $products->selling_price }}</s></span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            @if($products->product_quantity<=0)
                                                            <span class="badge badge-danger">Stock out</span>
                                                            @else
                                                            @endif
                                                            <div><a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">{{ $products->product_name }}</a>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="product_extras"> --}}
                                                        {{-- <div class="product_color"> --}}
                                                        {{-- <input type="radio" checked name="product_color" style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999"> --}}
                                                        {{-- </div> --}}
                                                        {{-- <button class="product_cart_button">Add to Cart</button> --}}
                                                        {{-- </div> --}}
                                                        <div class="product_extras">
                                                            @if($products->product_quantity<=0)
                                                            <button
                                                                class="product_cart_button">StockOut Product</button>
                                                            @else
                                                            <button id="{{ $products->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Add to
                                                                Cart</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <a class="addwishlist" data-id="{{ $products->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </a>
                                                    <ul class="product_marks">
                                                        @if ($products->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background:rgb(9, 95, 224);">new</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $products->selling_price - $products->discount_price;
                                                                    $discount = ($amount / $products->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end  hot new category three --}}

    {{-- hot new category four --}}
    @php
    $category = DB::table('categories')
        ->skip(3)
        ->first();
    $catid = $category?->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get();
    @endphp

    <div class="new_arrivals pt-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $category?->category_name }}</div>
                            <div class=""style="float:right"><a
                                href="{{ route('category.product', ['id' => $category?->id]) }}">View All</a>
                        </div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($product as $products)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a
                                                            href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">
                                                            <img src="{{ asset($products->image_one) }}" alt=""
                                                                style="height:120px; width:140px;">
                                                        </a>
                                                    </div>
                                                    <div class="product_content ">
                                                        @if ($products->discount_price == null)
                                                            <div class="product_price discount">
                                                                ৳{{ $products->selling_price }}</div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ৳{{ $products->discount_price }}<span><s>৳{{ $products->selling_price }}</s></span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            @if($products->product_quantity<=0)
                                                            <span class="badge badge-danger">Stock out</span>
                                                            @else
                                                            @endif
                                                            <div><a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">{{ $products->product_name }}</a>
                                                            </div>
                                                        </div>

                                                        <div class="product_extras">
                                                            <button id="{{ $products->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Add to
                                                                Cart</button>
                                                        </div>
                                                    </div>
                                                    <a class="addwishlist" data-id="{{ $products->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </a>
                                                    <ul class="product_marks">
                                                        @if ($products->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background:rgb(9, 95, 224);">new</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $products->selling_price - $products->discount_price;
                                                                    $discount = ($amount / $products->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end  hot new category four --}}


    {{-- hot new category five --}}
    @php
    $category = DB::table('categories')
        ->skip(4)
        ->first();
    $catid = $category?->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get();
    @endphp

    <div class="new_arrivals pt-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $category?->category_name }}</div>
                            <div class=""style="float:right"><a
                                href="{{ route('category.product', ['id' => $category?->id]) }}">View All</a>
                        </div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($product as $products)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a
                                                            href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">
                                                            <img src="{{ asset($products->image_one) }}" alt=""
                                                                style="height:120px; width:140px;">
                                                        </a>
                                                    </div>
                                                    <div class="product_content ">
                                                        @if ($products->discount_price == null)
                                                            <div class="product_price discount">
                                                                ৳{{ $products->selling_price }}</div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ৳{{ $products->discount_price }}<span><s>৳{{ $products->selling_price }}</s></span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            @if($products->product_quantity<=0)
                                                            <span class="badge badge-danger">Stock out</span>
                                                            @else
                                                            @endif
                                                            <div><a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">{{ $products->product_name }}</a>
                                                            </div>
                                                        </div>

                                                        <div class="product_extras">
                                                            <button id="{{ $products->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Add to
                                                                Cart</button>
                                                        </div>
                                                    </div>
                                                    <a class="addwishlist" data-id="{{ $products->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </a>
                                                    <ul class="product_marks">
                                                        @if ($products->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background:rgb(9, 95, 224);">new</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $products->selling_price - $products->discount_price;
                                                                    $discount = ($amount / $products->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end  hot new category five --}}


    <!-- Best Rated -->
    <div class="best_sellers" id="bestrated">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Hot Best Rated</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <div class="bestsellers_panel panel active">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                                @foreach ($bestrated as $bestrated)
                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img src="images/best_1.png" alt="">
                                            </div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a
                                                        href="#">{{ $bestrated->brand_name }}</a></div>
                                                <div class="bestsellers_name"><a
                                                        href="{{ url('product/details/' . $bestrated->id . '/' . $bestrated->product_name) }}">{{ $bestrated->product_name }}</a>
                                                </div>

                                                @if ($bestrated->discount_price == null)
                                                    <div class="bestsellers_price discount">
                                                        {{ $bestrated->selling_price }}৳</div>
                                                @else
                                                    <div class="bestsellers_price discount">
                                                        {{ $bestrated->discount_price }}৳<s
                                                            class="ml-1 text-dark">{{ $bestrated->selling_price }}৳</s>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                       <a class="addwishlist" data-id="{{ $products->id }}">
                                         <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                       </a>

                                        <ul class="bestsellers_marks">
                                            @if ($bestrated->discount_price == null)
                                                <li class="bestsellers_mark bestsellers_discount"
                                                    style="background-color:green">new</li>
                                            @else
                                                <li class="bestsellers_mark  bestsellers_discount">
                                                    @php
                                                        $amount = $bestrated->selling_price - $bestrated->discount_price;
                                                        $discount = ($amount / $bestrated->selling_price) * 100;
                                                    @endphp
                                                    {{ intval($discount) }}%
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="text-center">
                                            <a href=""id="{{ $bestrated->id }}"
                                                class="btn btn-outline-primary addcart" data-toggle="modal"
                                                data-target="#cartmodal" onclick="productview(this.id)">Add To Cart</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Trends/buyone and getone -->
    @php
    $buyone_getone = DB::table('products')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->select('products.*', 'brands.brand_name')
        ->where('products.status', 1)
        ->where('buyone_getone', 1)
        ->orderBy('id', 'desc')
        ->limit(6)
        ->get();
    @endphp

    <div class="trends" id="getbuy">
        <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Buy One Get One</h2>
                        <div class="trends_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                        </div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">

                            <!-- Trends Slider Item -->
                            @foreach ($buyone_getone as $buyone_getone)
                                <div class="owl-item">
                                    <div class="trends_item is_new">
                                        <div
                                            class="trends_image d-flex flex-column align-items-center justify-content-center">
                                            <a
                                                href="{{ url('product/details/' . $buyone_getone->id . '/' . $buyone_getone->product_name) }}">
                                                <img src="{{ asset($buyone_getone->image_one) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a
                                                    href="#">{{ $buyone_getone->brand_name }}</a></div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a
                                                        href="{{ url('product/details/' . $buyone_getone->id . '/' . $buyone_getone->product_name) }}">{{ $buyone_getone->product_name }}</a>
                                                </div>
                                                <div>
                                                    @if ($buyone_getone->discount_price == null)
                                                        <div class="product_price discount">
                                                            ৳{{ $buyone_getone->selling_price }}</div>
                                                    @else
                                                        <div class="product_price discount">
                                                            ৳{{ $buyone_getone->discount_price }}<span><s>৳{{ $buyone_getone->selling_price }}</s></span>
                                                        </div>
                                                    @endif
                                                    <a href="" id="{{ $buyone_getone->id }}"
                                                        class="btn btn-danger btn-sm addcart"data-toggle="modal"
                                                        data-target="#cartmodal" onclick="productview(this.id)">Add to
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">

                                            {{-- <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li> --}}
                                            @if ($buyone_getone->discount_price == null)
                                                <li class="trends_mark trends_new" style="background:rgb(9, 95, 224);">
                                                    BuyGet</li>
                                            @else
                                                <li class="trends_mark trends_new bg-danger">
                                                    @php
                                                        $amount = $buyone_getone->selling_price - $buyone_getone->discount_price;
                                                        $discount = ($amount / $buyone_getone->selling_price) * 100;
                                                    @endphp
                                                    {{ intval($discount) }}%
                                                </li>
                                            @endif
                                        </ul>
                                        <a class="addwishlist" data-id="{{ $buyone_getone->id }}">
                                            <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    {{-- <!-- Brands -->
    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">

                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_1.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_2.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_3.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_4.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_5.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_6.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_7.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('frontend/images/brands_8.jpg') }}" alt=""></div>
                            </div>

                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Newsletter -->

    <div class="newsletter" style="background-color:rgba(0, 168, 255,0.2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text">
                                <p>and receive %20 coupon for first shopping.</p>
                            </div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="{{ route('newsletter.store') }}" class="newsletter_form" method="post">
                                @csrf
                                <input type="email" class="newsletter_input" name="newsletter"required="required"
                                    placeholder="Enter your email address">
                                <button type="submit" class="newsletter_button">Subscribe</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLavel">Product Quick View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="" id="pimage" style="height: 220px; width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title text-center" id="pname"> </h5>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Code:<span id="pcode"></span> </li>
                                <li class="list-group-item">Category: <span id="pcat"></span></li>
                                <li class="list-group-item">Subcategory: <span id="psub"></span></li>
                                <li class="list-group-item">Brand:<span id="pbrand"></span> </li>
                                <li class="list-group-item">Stock: <span class="badge"
                                        style="background: green;color: white;"> Available</span> </li>
                            </ul>

                        </div>

                        <div class="col-md-4">

                            <form method="post" action="{{ route('insert.into.cart') }}">
                                @csrf

                                <input type="hidden" name="product_id" id="product_id">

                                <div class="form-group">
                                    <label for="exampleInputcolor">Color</label>
                                    <select name="color" class="form-control" id="color">

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputcolor">Size</label>
                                    <select name="size" class="form-control" id="size">

                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputcolor">Quantity</label>
                                    <input type="number" class="form-control" name="qty"  min="1" value="1">
                                </div>


                                <button type="submit" class="btn btn-primary">Add to Cart </button>

                            </form>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



    {{-- modal ajax --}}
    <script type="text/javascript">
        function productview(id) {
            $.ajax({
                url: "{{ url('/cart/product/view/') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#pcode').text(data.product.product_code);
                    $('#pcat').text(data.product.category_name);
                    $('#psub').text(data.product.subcategory_name);
                    $('#pbrand').text(data.product.brand_name);
                    $('#pname').text(data.product.product_name);
                    $('#pimage').attr('src', data.product.image_one);
                    $('#product_id').val(data.product.id);

                    var d = $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });

                    var d = $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });


                }
            })
        }
    </script>


    {{-- wishlist --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.addwishlist').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('add/wishlist/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            if ($.isEmptyObject(data.error)) {

                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });

                } else {
                    alert('danger');
                }
            });

        });
    </script>

    {{-- addcart --}}
    {{-- <script type="text/javascript">

    $(document).ready(function(){
      $('.addcart').on('click', function(){
         var id = $(this).data('id');
         if (id) {
             $.ajax({
                 url: " {{ url('add/cart/') }}/"+id,
                 type:"GET",
                 datType:"json",
                 success:function(data){
              const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   timerProgressBar: true,
                   onOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                   }
                 })

              if ($.isEmptyObject(data.error)) {

                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })
              }else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })
              }

                 },
             });

         }else{
             alert('danger');
         }
      });

    });

 </script> --}}
@endsection
