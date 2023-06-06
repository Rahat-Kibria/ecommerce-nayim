@extends('admin.admin_master')
@section('title')
    Brand Update -Page
@endsection

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Brand Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand Update</h6>

                <div class="table-wrapper">


                    <form action="{{ route('brand.update', ['id' => $editbrand->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="">Brand Name</label>
                                <input type="text" name="brand_name" id="" class="form-control"
                                    value="{{ $editbrand->brand_name }}">
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="">Brand Image</label>
                                        <input type="file" name="brand_log" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group" style="margin-top:35px">
                                        <img src="{{asset('upload/brand/'.$editbrand->brand_log)}}" alt="" style="width: 80px;">
                                    </div>
                                </div>
                            </div>

                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Upate</button>

                        </div>
                    </form>

                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

        <footer class="sl-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2022. Easy Find. All Rights Reserved.</div>
                <div>Made by Easy Team.</div>
            </div>
        </footer>

    </div><!-- sl-mainpanel -->
@endsection
