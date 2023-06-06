@extends('admin.admin_master')
@section('title')
Order -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Pending Order</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Order List</h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Phone</th>
                <th class="wd-15p">Message</th>

              </tr>
            </thead>
            <tbody>

              @foreach ($contact as $key=>$contacts )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$contacts->name}}</td>
                <td>{{$contacts->email}}</td>
                <td>{{$contacts->phone}}</td>
                <td>{!!$contacts->message!!}</td>


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
