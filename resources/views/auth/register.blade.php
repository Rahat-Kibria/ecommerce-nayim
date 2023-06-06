@extends('frontend.frontend_master')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('forntend/styles/contact_responsive.css') }}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>

                <div
                    class="col-lg-6 rounded p-3"style="border:2px solid #0984e3;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">SignUp</div>

                        <form method="POST" action="{{ route('store.user') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text"class="form-control" id="name" name="name"
                                    placeholder="username" required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <div class="alert text-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">User Email</label>
                                <input type="email"class="form-control" id="email" name="email" placeholder="email"
                                    required>
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <div class="alert text-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">User Phone Number</label>
                                <input type="number"class="form-control" id="phone" name="phone"
                                    placeholder="phone number" required>
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <div class="alert text-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password"class="form-control" id="password" name="password"
                                    placeholder="password" required>
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <div class="alert text-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password"class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="confirm password" required>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">SignUp</button>
                            </div>

                            <p class="text-center mt-2">Already Have An Account?<a href="{{ route('user.login') }}">Login
                                    Now</a>
                            </p>
                        </form>

                    </div>
                </div>
                <div class="col-lg-3"></div>

            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
