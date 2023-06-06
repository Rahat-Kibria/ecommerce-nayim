@extends('admin.admin_master')
@section('title')
Store View -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Store Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 ">
        <h6 class="card-body-title">Store Lists </h6>

        <div class="table-wrapper table-responsive">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Product Name</th>
                <th class="wd-15p">Product Code</th>
                <th class="wd-15p">Product Quantity</th>
                <th class="wd-15p">Product Image</th>
                <th class="wd-15p">Category</th>
                <th class="wd-15p">Status</th>

              </tr>
            </thead>
            <tbody>

              @foreach ($product as $key=>$products )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{ $products->product_name }}</td>
                <td>{{ $products->product_code }}</td>
                <td>{{ $products->product_quantity }}</td>
                <td><img src="{{ asset($products->image_one) }}" alt="" style="width:60px;"></td>
                <td>{{ $products->category->category_name }}</td>
                <td>
                    @if ($products->status==1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Deactive</span>
                    @endif

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
