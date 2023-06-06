@extends('admin.admin_master')
@section('title')
Cupon -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Cupon Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Coupon List
            <a href=""class='btn btn-sm btn-primary rounded' style="float: right"data-toggle="modal" data-target="#modaldemo3">Add Coupon</a>
        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Coupon</th>
                <th class="wd-15p">Coupon Percentage</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($cupon as $key=>$cupons )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{ $cupons->cupon}}</td>
                <td>{{ $cupons->discount}}%</td>
                <td>
                    <a href="{{ route('cupon.edit',['id'=>$cupons->id]) }}" class="btn btn-sm btn-info rounded"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('cupon.delete',['id'=>$cupons->id]) }}" class="btn btn-sm btn-danger rounded" id="delete"><i class="fa fa-trash"></i></a>
                </td>

              </tr>

              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div><!-- sl-pagebody -->


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
        <form action="{{ route('cupon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body pd-20">
            <div class="form-group">
              <label for="">Cupon</label>
              <input type="text" name="cupon" id="" class="form-control" placeholder="Enter Cupon">
            @error('cupon')
                <div class="alert text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="">Cupon Discount %</label>
                <input type="text" name="discount" id="" class="form-control" placeholder="Enter Discount">
              @error('discount')
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
