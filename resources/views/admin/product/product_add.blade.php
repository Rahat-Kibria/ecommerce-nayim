@extends('admin.admin_master')

@section('title')
Product Add -Page
@endsection

@section('content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Product Add
                    <a href="{{ route('product.view') }}" class="btn btn-success btn-sm pull-right"> All Products</a>
                </h6>

                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                        placeholder="Enter Product Name">
                                        @error('product_name')
                                          <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div><!-- col-4 -->
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity"
                                        placeholder="product quantity">
                                        @error('product_quantity')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}
                        <div class="row mg-b-25">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price"
                                        placeholder="Price">
                                        @error('selling_price')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->
                          
                          

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="discount_price"
                                        placeholder="Discount Price">
                                        @error('discount_price')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category:</label>
                                    <select class="form-control select2"name="subcategory_id">

                                    </select>
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand:</label>
                                    <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                                        <option label="Choose Brand"></option>

                                        @foreach ($brand as $brands)
                                            <option value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: </label>
                                    <input class="form-control" type="text" name="product_size" id="size"
                                        data-role="tagsinput">
                                        @error('product_size')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color:</label>
                                    <input class="form-control" type="text" name="product_color" id="color"
                                        data-role="tagsinput">
                                        @error('product_color')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->

                            

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code:</label>
                                    <input class="form-control" type="text" name="product_code"
                                        placeholder="Enter Product Code">
                                        @error('product_code')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->

                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: </label>

                                    <textarea class="form-control" id="summernote" name="product_details"> </textarea>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: </label>
                                    <input class="form-control" name="video_link" placeholder="Video Link">
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
                                            onchange="readURL(this);" required="">
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="one">
                                    </label>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: </label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_two"
                                            onchange="readURL2(this);" >
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="two">
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
                                        <img src="#" id="three">
                                    </label>

                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <br><br>

                        <div class="row">

                            <div class="col-lg-2">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal</span>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-2">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated</span>
                                </label>
                            </div> <!-- col-4 -->
                            <div class="col-lg-2">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1">
                                    <span>Trend Product </span>
                                </label>
                            </div> <!-- col-4 -->
                            <div class="col-lg-2">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Mid Slider</span>
                                </label>
                            </div> <!-- col-4 -->

                            <div class="col-lg-2">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1">
                                    <span>Hot New </span>
                                </label>
                            </div> <!-- col-4 -->
                        </div>
                        {{-- end row --}}

                        <div class="row ">


                         
                        </div>
                        {{-- end row --}}
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1">
                                    <span>Buy One Get One</span>
                                </label>

                            </div> <!-- col-4 -->
                        </div>

                        <br><br>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Submit</button>
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
