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
        <div class="row" style="margin-top: -400px;">
            <div class="col-lg-12 mb-5">
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
                        <div class="col-lg-4 mt-5 mb-2 ms-3 float-md-end">
                            <div class="card mt-2" style="border: none;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset('image/askom.jpg')}}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="card mt-2" style="border: none;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset('image/img_default.jpg')}}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>
                        <p class="description mb-5">
                            {!!$article->content!!}
                        </p>
                        <div class="row mt-5 border-top">
                            <div class="col-12">
                                <span class="fw-bold text-secondary small mb-1">Share</span>
                                <div class="d-flex flex-row mt-3">
                                    <div class="me-3">
                                        <a class="text-primary" href="#" data-sharer="facebook" data-hashtag="trilogikaedutama" data-url="https://trilogikaedutama.id/article/{{$article->slug}}">
                                            <i class="fab fa-facebook-f" style="font-size: xx-large;"></i>
                                        </a>
                                    </div>
                                    <div class="me-3">
                                        <a class="text-success" href="#" data-sharer="whatsapp" data-title="{{$article->title}}" data-url="https://trilogikaedutama.id/article/{{$article->slug}}">
                                            <i class="fab fa-whatsapp-square" style="font-size: xx-large;"></i>
                                        </a>
                                    </div>
                                    <div class="me-3">
                                        <i class="fas fa-link" style="cursor: pointer; font-size: xx-large;" onclick="copyURL(this)" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied"></i>

                                        <!-- <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
                                            Popover on top
                                        </button> -->

                                        <!-- <i class="fas fa-link" style="font-size: xx-large;"></i> -->
                                    </div>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
    @section('script')

    <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
    <script>
        // popover
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });

        function copyURL(icon) {
            var currentURL = window.location.href;

            var tempInput = document.createElement("input");
            tempInput.value = currentURL;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            console.log("URL copied: " + currentURL)
            icon.classList.add('text-secondary');
        }
    </script>
    @endsection