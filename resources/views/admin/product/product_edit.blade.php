@extends('admin.admin_master')
@section('title')
Product Edit -Page
@endsection

@section('content')

    <div class="sl-mainpanel">
      

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Update</h6>
                {{-- <p class="mg-b-20 mg-sm-b-30">New Prodcut Add From</p> --}}

                <form method="post" action="{{ route('product.update',['id'=>$product->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}">

                                </div>
                            </div><!-- col-4 -->
                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}">
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}
                        <div class="row mg-b-25">
                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: </label>
                                    <input class="form-control" type="number" name="discount_price" value="{{ $product->discount_price }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}"
                                            <?php
                                            if( $categories->id==$product->category_id ){
                                                echo 'selected';
                                            }
                                            ?>>{{ $categories->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!-- col-4 -->

                           
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: </label>
                                    <select class="form-control select2"name="subcategory_id">
                                        @foreach ($subcategory as $subcategories)
                                            <option value="{{ $subcategories->id }}"
                                            <?php
                                            if( $subcategories->id==$product->subcategory_id ){
                                                echo 'selected';
                                            }
                                            ?>>{{ $subcategories->subcategory_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                           
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                                        <option label="Choose Brand"></option>

                                        @foreach ($brand as $brands)
                                            <option value="{{ $brands->id }}"
                                            <?php
                                                if( $brands->id==$product->brand_id ){
                                                echo 'selected';
                                            }
                                            ?>>{{ $brands->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size:</label>
                                    <input class="form-control" type="text" name="product_size" id="size"data-role="tagsinput" value="{{ $product->product_size }}">
                                </div>
                            </div><!-- col-4 -->
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: </label>
                                    <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}">
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                         
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: </label>
                                    <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput"value="{{ $product->product_color }}">

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details:</label>

                                    <textarea class="form-control" id="summernote" name="product_details">{{ $product->product_details }} </textarea>

                                </div>
                            </div><!-- col-4 -->

                        </div>
                        {{-- end row --}}

                      

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link:</label>
                                    <input class="form-control" name="video_link" value="{{ $product->video_link }}">
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
                                        <input type="file" id="file" class="custom-file-input" name="image_one"
                                            onchange="readURL(this);" >
                                        <span class="custom-file-control"></span>
                                        <img src="{{ asset($product->image_one) }}" id="one" style="width:80px;margin-top:5px;margin-bottom:5px;">
                                    </label>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: </label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_two"
                                            onchange="readURL2(this);">
                                        <span class="custom-file-control"></span>
                                        <img src="{{ asset($product->image_two) }}" id="two"style="width:80px;margin-top:5px;margin-bottom:5px;">
                                    </label>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three: <span
                                            class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input"
                                            name="image_three" onchange="readURL3(this);">
                                        <span class="custom-file-control"></span>
                                        <img src="{{ asset($product->image_three) }}" id="three"style="width:80px;margin-top:5px;margin-bottom:5px;">
                                    </label>

                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <br><br>

                        <div class="row">

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1"
                                    <?php
                                    if($product->main_slider==1){
                                         echo 'checked';
                                    }
                                    ?>>
                                    <span>Main Slider</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1"
                                    <?php
                                    if($product->hot_deal==1){
                                        echo 'checked';
                                    }

                                    ?>>
                                    <span>Hot Deal</span>
                                </label>

                            </div> <!-- col-4 -->



                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1"
                                    <?php
                                    if($product->best_rated==1){
                                        echo 'checked';
                                    }
                                    ?>>
                                    <span>Best Rated</span>
                                </label>

                            </div> <!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row ">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1"
                                    <?php
                                    if($product->trend==1){
                                        echo 'checked';
                                    }

                                    ?>>
                                    <span>Trend Product </span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1"
                                    <?php
                                    if ($product->mid_slider==1) {
                                       echo 'checked';
                                    }
                                    ?>>
                                    <span>Mid Slider</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1"
                                    <?php
                                    if($product->hot_new==1){
                                        echo 'checked';
                                    }

                                    ?>>
                                    <span>Hot New </span>
                                </label>

                            </div> <!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1"
                                    <?php
                                    if($product->buyone_getone==1){
                                        echo 'checked';
                                    }

                                    ?>>
                                    <span>Buy One Get One</span>
                                </label>

                            </div> <!-- col-4 -->
                        </div>

                        <br><br>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Update</button>
                            {{-- <button class="btn btn-secondary">Cancel</button> --}}
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                 </div><!-- card -->

            </form>




        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!--  END: MAIN PANEL  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
       $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            // console.log(category_id);
            if (category_id) {

              $.ajax({
                url: "{{ url('admin/get/subcategory/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                var d =$('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){

                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                });
                },
              });

            }else{
              alert('danger');
            }

              });
        });

   </script>




    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



    <script type="text/javascript">
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
