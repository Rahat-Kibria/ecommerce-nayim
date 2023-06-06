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
                    <h5 class="card-title">Site Setting</h5>
                </div>
                <form class="forms-sample" action="{{ route('update.setting', ['id' => $setting?->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Vate: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number"name="vat" value="{{ $setting?->vat }}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Shipping Charge: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number"name="shipping_charge"
                                        value="{{ $setting?->shipping_charge }}">
                                </div>
                            </div>
                        </div>
                        {{-- end row --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Name <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="shopname"
                                        value="{{ $setting?->shopname }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Email <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{ $setting?->email }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Phone <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone" value="{{ $setting?->phone }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Address <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address"
                                        value="{{ $setting?->address }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Logo <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="logo">
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
