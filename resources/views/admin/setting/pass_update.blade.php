@extends('admin.admin_master')
@section('content')
<section>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">admin</a>
            <span class="breadcrumb-item active">password update</span>
          </nav>
          <div class="card" style="width:100%">
            <div class="card-body">
              <h5 class="card-title">Paaword Update</h5>
            </div>
            <form class="forms-sample" action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Current Password: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="password" id="current_password" name="oldpassword" placeholder="Enter Current Password">
                            @error('oldpassword')
                                <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Enter New Password">
                            @error('password')
                                <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                </div>
                {{-- end row --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Current Password">
                            @error('password_confirmation')
                                <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
          </form>
          </div>
    </div>
</section>
@endsection

