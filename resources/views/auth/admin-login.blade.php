<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('frontend.includes.meta')
    @include('frontend.includes.css')
</head>

<body>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('forntend/styles/contact_responsive.css') }}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div
                    class="col-lg-6  rounded p-3 "style="border:2px solid #0984e3; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>

                        <form method="POST" action="{{ route('admin.login.verify') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <div class="alert text-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <div class="alert text-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            {{-- <div class="form-group">
                                <a href="{{ route('password.request') }}" class="forgot-pass" style="float: right">Forgot
                                    Password</a>
                            </div> --}}

                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    @include('frontend.includes.js')
</body>

</html>
