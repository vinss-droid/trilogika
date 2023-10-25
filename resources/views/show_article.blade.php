@extends('layouts.main')
@section('style')
<style>
    footer {
        background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg");
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    section.heading-page {
        background-image: url('{{asset("image/article")}}/{{$article->image}}');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 230px;
        padding-bottom: 110px;
        text-align: center;
        filter: grayscale(70%) brightness(50%);
    }

    .meeting-single-item .down-content p.description {
        margin-top: 0px;
        padding-top: 0px;
        border-top: 1px solid #eee;
        margin-bottom: 0px;
        padding-bottom: 0px;
        border-bottom: 1px solid #eee;
    }

    .social {
        top: 5px;
        position: relative;
        margin: 0;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }
</style>
@endsection
@section('content')
<section class="heading-page header-text" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6>1</h6>
                <h2>1</h2>
            </div>
        </div>
    </div>
</section>
<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5" style="margin-top: -400px;">
                <div class="meeting-single-item">
                    <div class="thumb">
                        <div class="date">
                            <h6>{{Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('D MMM')}}<span>{{Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('YYYY')}}</span></h6>
                        </div>
                        @if (!$article->image)
                        <img src="{{asset('image/img_default.jpg')}}" style="height: 400px; object-fit: cover;" alt="">
                        @else
                        <img class="object-fit-cover" src="{{asset('image/article/'.$article->image)}}" style="height:400px;" alt="">
                        @endif
                    </div>
                    <div class="down-content">
                        <div class="text-center">
                            <h4 class="fs-2 ">{{$article->title}}</h4>
                            <p class="text-secondary">By: Admin | {{Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('DD MMMM YYYY')}}</p>
                        </div>
                        <p class="description mb-5">
                            {!!$article->content!!}
                        </p>
                        <div class="row mt-5 border-top">
                            <div class="col-12">
                                <span class="fw-bold text-secondary small mb-1">Share</span>
                                <div class="d-flex flex-row mt-3">
                                    <div class="me-3"><i class="fab fa-facebook-f fa-lg"></i></div>
                                    <div class="me-3"><i class="fab fa-twitter fa-lg"></i></div>
                                    <div class="me-3"><i class="fas fa-paper-plane fa-lg"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection