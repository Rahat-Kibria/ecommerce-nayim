@extends('frontend.frontend_master')
@section('title')
    Subcategory Product -pages
@endsection
@section('content')
@include('frontend.pages.header')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Home -->
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            @foreach ($headsubcate as $headsubcate )
            <h2 class="home_title">{{ $headsubcate->subcategory_name }}</h2>
            @endforeach
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">

                                @foreach ($category as $category )
                                <li><a href="{{ route('category.product',['id'=>$category->id]) }}">{{ $category->category_name  }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        {{-- <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly
                                        style="border:0; font-weight:bold;"></p>
                            </div>
                        </div> --}}

                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                               @foreach ($brand as $brands )
                               @php
                                   $brand=DB::table('brands')->where('id',$brands->brand_id)->first();
                               @endphp
                               <li class="brand"><a href="#">{{ $brand->brand_name }}</a></li>
                               @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{ count($product) }}</span> products found</div>
                            {{-- <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button"
                                                data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name
                                            </li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>

                        <div class="product_grid row">
                            <div class="product_grid_border"></div>

                            @foreach ($product as $products)
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <a href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}">
                                            <img src="{{ asset($products->image_one) }}" alt=""
                                            style="height: 100px; width: 100px;">
                                        </a>
                                        </div>
                                    <div class="product_content">

                                        @if ($products->discount_price == null)
                                            <div class="product_price discount">৳{{ $products->selling_price }}<span> </div>
                                        @else
                                            <div class="product_price discount">
                                                ৳{{ $products->discount_price }}<span>৳{{ $products->selling_price }}</span></div>
                                        @endif

                                        <div class="product_name">
                                            <div><a href="{{ url('product/details/' . $products->id . '/' . $products->product_name) }}"
                                                    tabindex="0">{{ $products->product_name }} </a></div>
                                        </div>
                                    </div>

                                    <a class="addwishlist"data-id="{{ $products->id }}">
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    </a>


                                    <ul class="product_marks">
                                        @if ($products->discount_price == null)
                                            <li class="product_mark product_new" style="background: blue;">New</li>
                                        @else
                                            <li class="product_mark product_new" style="background: red;">
                                                @php
                                                    $amount = $products->selling_price - $products->discount_price;
                                                    $discount = ($amount / $products->selling_price) * 100;

                                                @endphp

                                                {{ intval($discount) }}%

                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach

                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">

                            {{ $product->links('vendor.pagination.custom') }}

                     </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/shop_custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


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

@endsection
