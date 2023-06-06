@extends('admin.admin_master')
@section('title')
All Return Request -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Return Order</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Return List</h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Payment Type</th>
                <th class="wd-15p">Transaction Id</th>
                <th class="wd-15p">Sub Total</th>
                <th class="wd-15p">Shipping</th>
                <th class="wd-15p">Total</th>
                <th class="wd-15p">Date</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($order as $key=>$orders )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$orders->payment_type}}</td>
                <td>{{$orders->blnc_transection}}</td>
                <td>{{$orders->subtotal}}</td>
                <td>{{$orders->shipping}}</td>
                <td>{{$orders->total}}</td>
                <td>{{$orders->date}}</td>
                <td>
                    @if ($orders->return_order==1)
                   <span class="badge badge-warning">Pending</span>
                   @elseif ($orders->return_order==2)
                    <span class="badge badge-success">success</span>

                    @else
                    @endif
                </td>
                <td>
                   <a href=""><span class="badge badge-success">success return</span></a>

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
