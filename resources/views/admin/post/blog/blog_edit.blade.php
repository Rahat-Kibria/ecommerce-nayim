@extends('admin.admin_master')

@section('title')
Post Update -Page
@endsection

@section('content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Poat Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Post Add</h6>
                <p class="mg-b-20 mg-sm-b-30">Update Post Add From</p>

                <form method="post" action="{{ route('blog.update',['id'=>$post->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_eng" value="{{ $post->post_title_eng }}">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Ttitle Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_bang" value="{{ $post->post_title_bang }}">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Post Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="post_category_id">
                                        <option label="Choose Post Category"></option>
                                        @foreach ($postcategory as $postcategories)
                                            <option value="{{ $postcategories->id }}"
                                            <?php
                                            if($postcategories->id==$post->post_category_id){
                                                echo 'selected';
                                            }
                                            ?>>{{ $postcategories->post_category_eng }}||{{ $postcategories->post_category_bang }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}


                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details English: <span
                                            class="tx-danger">*</span></label>

                                    <textarea class="form-control" id="summernote" name="post_details_eng">{{ $post->post_details_eng }} </textarea>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details Bangla: <span
                                            class="tx-danger">*</span></label>

                                    <textarea class="form-control" id="summernote1" name="post_details_bang"> {{ $post->post_details_bang }}</textarea>

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}



                        <div class="row mg-b-25">
                            <div class="col-lg-4 ">
                                <div class="form-group">
                                    <label class="form-control-label">Post Image: <span
                                            class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="post_image"
                                            onchange="readURL(this);" required="">
                                        <span class="custom-file-control"></span>
                                        <img src="{{ asset($post->post_image) }}" id="one" style="width:100px">
                                    </label>

                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
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




@endsection
