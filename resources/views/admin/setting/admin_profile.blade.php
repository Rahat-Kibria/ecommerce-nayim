@extends('admin.admin_master')
@section('content')
    <section>
        <div class="sl-mainpanel">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">admin Profile Update</a>
            </nav>
            <div class="card" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Site Setting</h5>
                </div>
                <form class="forms-sample" action="{{ route('update.adminprofile', ['id' => $adminProfile->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Logo <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="profile_photo_path">
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
