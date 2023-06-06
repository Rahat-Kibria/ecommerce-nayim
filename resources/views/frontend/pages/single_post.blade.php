@extends('frontend.frontend_master')
@section('title')
SinglePost -Pages
@endsection

@section('content')
@include('frontend.pages.header')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_responsive.css') }}">

{{-- single post --}}
<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="single_post_title">
                    @if (Session()->get('lang')=='bangla')
                            <div class="blog_text text-center">{{ $post->post_title_eng }}</div>
                            @else
                            <div class="blog_text text-center">{{ $post->post_title_bang}}</div>
                            @endif
                </div>

                <div class="single_post_quote text-center" style="margin: 0px !important">
                    <div class="quote_image"><img src="{{ asset($post->post_image) }}" alt=""></div>
                </div>

                <div class="single_post_text">
                    <p>
                        @if (Session()->get('lang')=='bangla')
                            {!! $post->post_details_eng !!}
                            @else
                            {!! $post->post_details_bang !!}
                            @endif
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('frontend/js/blog_single_custom.js') }}"></script>
@endsection
