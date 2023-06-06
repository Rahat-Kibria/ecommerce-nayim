@extends('frontend.frontend_master')
@section('title')
Blog -Pages
@endsection

@section('content')
@include('frontend.pages.header')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_responsive.css') }}">


<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">Blog</h2>
    </div>
</div>

	<!-- Blog -->
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                        @foreach ($blog as $blog )
                        	<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image w-100" style="background-image:url({{ asset($blog->post_image) }})"></div>
							@if (Session()->get('lang')=='bangla')
                            <div class="blog_text">{{ $blog->post_title_eng }}</div>
                            @else
                            <div class="blog_text">{{ $blog->post_title_bang}}</div>
                            @endif
							<div class="blog_button"><a href="{{ route('single.post',['id'=>$blog->id])}}">
                                @if (Session()->get('lang')=='bangla')
                                Continue Reading
                                @else
                                পড়া চালিয়ে যান
                                @endif

                            </a></div>
						</div>

                        @endforeach

					</div>
				</div>

			</div>
		</div>
	</div>

    <script src="{{ asset('frontend/js/blog_custom.js') }}"></script>
@endsection
