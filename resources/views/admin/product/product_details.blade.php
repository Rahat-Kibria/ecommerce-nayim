@extends('admin.admin_master')
@section('title')
Product Details -Page
@endsection


@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">

                <p class="mg-b-20 mg-sm-b-30 text-center" style="font-size:30px;">Product Details</p>

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->product_name }}</strong>

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->product_code }}</strong>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->product_quantity }}</strong>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span
                                            class="tx-danger">*</span></label>
                                            <br>
                                    <strong>{{ $product->discount_price}}%</strong>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->category->category_name}}</strong>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->subcategory->subcategory_name}}</strong>

                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->brand->brand_name}}</strong>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->product_size}}</strong>


                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span
                                            class="tx-danger">*</span></label>
                                            <br>
                                    <strong>{{ $product->product_color}}</strong>

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                            <br>
                                    <strong>{{ $product->selling_price}}</strong>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span
                                            class="tx-danger">*</span></label>
                                            <br>
                                    <strong>{{ $product->product_details}}</strong>



                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $product->video_link}}</strong>



                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}


                        <div class="row mg-b-25">
                            <div class="col-lg-4 ">
                                <div class="form-group">
                                    <label class="form-control-label">Image One ( Main Thumbnali): <span
                                            class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <img src="{{ asset($product->image_one) }}" id="" style="width:100px">
                                    </label>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                    <label class="custom-file">

                                        <img src="{{ asset($product->image_two) }}" id="" style="width:100px">
                                    </label>

                                </div>
                            </div><!-- col-4 -->




                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three: <span
                                            class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <img src="{{ asset($product->image_three) }}" id="" style="width:100px">
                                    </label>

                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <br><br>

                        <div class="row">

                            <div class="col-lg-4">
                                <label>Main Slider
                                   @if ($product->main_slider==1)
                                   <span class="badge badge-success">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label>Hot Deal
                                   @if ($product->hot_deal==1)
                                   <span class="badge badge-success">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </label>

                            </div> <!-- col-4 -->



                            <div class="col-lg-4">
                                <label>Best Rated
                                   @if ($product->best_rated==1)
                                   <span class="badge badge-success">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </label>

                            </div> <!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row ">
                            <div class="col-lg-4">
                                <label>Trend
                                   @if ($product->trend==1)
                                   <span class="badge badge-success">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label>Mid Slider
                                   @if ($product->mid_slider==1)
                                   <span class="badge badge-success">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label>Hot New
                                   @if ($product->hot_new==1)
                                   <span class="badge badge-success">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </label>

                            </div> <!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <br><br>
                    </div><!-- form-layout -->
                 </div><!-- card -->






        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!--  END: MAIN PANEL  -->

@endsection
