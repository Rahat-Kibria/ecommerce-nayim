@extends('admin.admin_master')
@section('title')
Newsletter -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Category Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Newsletter List </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">E-mail</th>
                <th class="wd-15p">Subscribing Time</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($newsletter as $key=>$newsletters )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{ $newsletters->newsletter }}</td>
                <td>{{ \Carbon\Carbon::parse($newsletters->created_at)->diffForhumans() }}</td>
                <td>

                    <a href="{{ route('newsletter.delete',['id'=>$newsletters->id]) }}" class="btn btn-sm btn-danger rounded" id="delete"><i class="fa fa-trash"></i></a>
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







   {{-- add modal --}}
   <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body pd-20">
            <div class="form-group">
              <label for="">Category Name</label>
              <input type="text" name="category_name" id="" class="form-control" placeholder="category name">
            @error('category_name')
                <div class="alert text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Submit</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        </div>
    </form>

      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->


@endsection
