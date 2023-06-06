@extends('frontend.frontend_master')

@section('title')
Product Details -Page
@endsection

@section('content')
@include('frontend.pages.header')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">
<!-- Single Product -->
<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset($product->image_one) }}"><img src="{{ asset($product->image_one) }}" alt=""></li>
                    <li data-image="{{ asset($product->image_two) }}"><img src="{{ asset($product->image_two) }}" alt=""></li>
                    <li data-image="{{ asset($product->image_three) }}"><img src="{{ asset($product->image_three) }}" alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset($product->image_one) }}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">

                   @if ($product->subcategory_id==null)
                   <div class="product_category">{{ $product->category->category_name }} <span class="bold"> ></span> </div>
                   @else
                   <div class="product_category">{{ $product->category->category_name }} <span class="bold"> ></span> {{$product->subcategory->subcategory_name  }}</div>
                   @endif

                    <div class="product_name">{{ $product->product_name }}</div>
                    {{-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                    <div class="product_text"><p>{!! str_limit($product->product_details ,$limit=600)!!}</p></div>
                    <div class="order_info d-flex flex-row">

                        <form action="{{ route('product.addcart',['id'=>$product->id]) }}" method="POST">
                            @csrf

                        <div class="row">
                            @if ($product->product_color==null)

                            @else
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"class="ml-2">Color</label>
                                    <select name="color"class="form-control input-lg" id="exampleFormControlSelect1">
                                        @foreach ($product_color as $color )
                                        <option value="{{$color}}">{{$color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if ($product->product_size==null)

                            @else
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2" class="ml-2">Size</label>
                                    <select name="size" class="form-control input-lg" id="exampleFormControlSelect2">
                                       @foreach ($product_size as $size )
                                       <option value="{{$size}}">{{$size}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            @endif

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3" class="ml-2">Quantity</label>
                                   <input type="number" class="form-control" name="qty" value="1" min="1" pattern="[0-9]">
                                </div>
                            </div>
                        </div>



                            <div class="product_price">
                                @if ($product->discount_price==null)
                                <div class="">৳{{$product->selling_price  }}</div>
                                @else
                                <div class="">৳{{$product->discount_price}}<span><s>৳{{$product->selling_price  }}</s></span></div>
                                @endif
                            </div>
                            <div class="button_container">
                                <button type="submit" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                            {{-- share div --}}
                            <div class="mt-4">
                                <div class="addthis_inline_share_toolbox_racd"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Product Details</h3>
                    <div class="viewed_nav_container">
                        
                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>{!! $product->product_details !!}</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>{{ $product->video_link }}</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>

                        {{-- fb commnet div --}}
                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

                    </div>
                  </div>

            </div>
        </div>
    </div>
</div>
<!-- share js -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62e74e955a098dd6"></script>
{{-- fb comment js --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v14.0" nonce="WChLd51w"></script>
@endsection
