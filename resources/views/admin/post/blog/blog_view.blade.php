@extends('admin.admin_master')
@section('title')
Post View -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Post Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 ">
        <h6 class="card-body-title">Post List </h6>

        <div class="table-wrapper table-responsive">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Post Title Enaglish</th>
                <th class="wd-15p">Post Title Bangla</th>
                <th class="wd-15p">Post Image</th>
                <th class="wd-15p">Post Category</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($blog as $key=>$blogs )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{ $blogs->post_title_eng }}</td>
                <td>{{ $blogs->post_title_bang }}</td>
                <td><img src="{{ asset($blogs->post_image) }}" alt="" style="width:60px;"></td>
                <td>{{ $blogs->postcategory->post_category_eng }}||{{ $blogs->postcategory->post_category_bang }}</td>
                <td>
                    <a href="{{ route('blog.edit',['id'=>$blogs->id]) }}" class="btn btn-sm btn-info rounded"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('blog.delete',['id'=>$blogs->id]) }}" class="btn btn-sm btn-danger rounded" id="delete"><i class="fa fa-trash"></i></a>

                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
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
