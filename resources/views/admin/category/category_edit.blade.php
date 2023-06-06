@extends('admin.admin_master')
@section('title')
    Category -Page
@endsection

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Update</h6>

                <div class="table-wrapper">


                    <form action="{{ route('category.update', ['id' => $updateCategory->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="category_name" id="" class="form-control"
                                    value="{{ $updateCategory->category_name }}">
                                @error('category_name')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
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
