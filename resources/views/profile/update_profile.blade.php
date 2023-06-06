@extends('frontend.frontend_master')
@section('content')
    @php
        $userdata = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="contact_form mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8  rounded  ">
                    <div class="card p-3">
                        <div class="contact_form_container">
                            <h3 class="contact_form_title text-center">User Update Profile
                        </div>

                        <form method="POST" action="{{ route('changeuser.profile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">

                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control"value="{{ $user->email }}">

                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="avater" id="image" class="form-control">
                            </div>
                            {{-- old image --}}
                            <div class="form-group">
                                <div class="controls">
                                    <img src="{{ !empty($user->avater) ? url('upload/user_profile/' . $user->avater) : url('upload/no-image.jpg') }}"
                                        class="rounded" id="showimage" alt="" style="width: 80px;height:80px;">

                                </div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
