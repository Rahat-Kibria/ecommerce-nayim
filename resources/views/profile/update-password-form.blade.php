@extends('frontend.frontend_master')
@section('content')
    @php
        $userdata = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
    @endphp
    <div class="contact_form mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8  rounded  ">
                    <div class="card p-3">
                        <div class="contact_form_container">
                            <h3 class="contact_form_title text-center">User Password Update
                        </div>

                        <form method="POST" action="{{ route('userpassword.update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Cureent Password</label>
                                <input type="password" name="oldpassword" id="cureent_password" class="form-control"
                                    placeholder="Enter Old Password">
                                @error('oldpassword')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter new Password">
                                @error('password')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Enter Confirm Password" required="">
                                @error('password')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <img src="{{ !empty($userdata->avater) ? url('upload/user_profile/' . $userdata->avater) : url('upload/no-image.jpg') }}"
                            alt="" class="card-img-top rounded" style="height: 90px; width:90px; margin-left:34%;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Auth::user()->name }}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('userpassword.change') }}">Password Change</a>
                            </li>
                            <li class="list-group-item"><a href="{{ route('updateuser.profile') }}">Edit Profile</a></li>
                            <li class="list-group-item"><a href="{{ route('return.order') }}">Return Order</a></li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-sm btn-block btn-danger ">Logout</a>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
@endsection
