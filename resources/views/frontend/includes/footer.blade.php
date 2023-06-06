<footer class="footer" style="background-color: rgba(60, 99, 130,0.3)">
    <div class="container">
        <div class="row">
@php
    $setting=DB::table('setiings')->first();
@endphp
            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="{{url('/')}}"><img src="{{ asset('upload/site/'.$setting?->logo) }}" alt="" style="width:150px "></a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">{{ $setting?->phone }}</div>
                    <div class="footer_contact_text">
                        <p>{{ $setting?->address }}</p>

                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Use Full Link</div>
                    <ul class="footer_list">
                        <li><a href="{{ route('about.page') }}">About Us</a></li>
                        {{-- <li><a href="#">FAQs</a></li> --}}
                        <li><a href="{{ route('contact.page') }}">Contact Us</a></li>
                        {{-- <li><a href="#">Careers</a></li> --}}
                    </ul>


                </div>
            </div>

            {{-- <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Service</div>
                    <ul class="footer_list ">
                        <li><a href="#">Return & Refund Policy</a></li>
                        <li><a href="#">Support Policy</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and conditions</a></li>
                    </ul>
                </div>
            </div> --}}

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">My Account</div>
                    <ul class="footer_list">
                        <li><a href="#">Signup / Login</a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright" style="background-color: rgba(130, 204, 221,.2)">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
