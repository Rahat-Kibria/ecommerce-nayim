@extends('admin.admin_master')
@section('title')
    Post Category -Page
@endsection

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Post Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">POST Category Update</h6>

                <div class="table-wrapper">


                    <form action="{{ route('postcategory.update', ['id' => $postcategory->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="post_category_eng" id="" class="form-control"
                                    value="{{ $postcategory->post_category_eng}}">

                            </div>
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="post_category_bang" id="" class="form-control"
                                    value="{{ $postcategory->post_category_bang }}">
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
