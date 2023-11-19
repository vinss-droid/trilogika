@extends('layouts.main')
@php
setlocale(LC_TIME, 'id_ID');
App::setLocale('id');
@endphp
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
        background-image: none;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 300px;
        padding-bottom: 110px;
        text-align: center;
        filter: grayscale(70%) brightness(50%);
    }

    .header-area {
        background-color: var(--bs-gray-dark);
        position: absolute;
        top: 40px;
        left: 0;
        right: 0;
        z-index: 100;
        -webkit-transition: all .5s ease 0s;
        -moz-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s;
    }

    section.contact-us {
        background-image: none;
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

    /* recent article<1000px */
    @media (max-width: 1000px) {
        #recent-article {
            display: none;
        }
    }
</style>
@endsection

@section('content')
<section class="heading-page header-text" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="pt-5"></h6>
                <h2 class="pt-5"></h2>
            </div>
        </div>
    </div>
</section>
<section class="bg-white" style="margin-top: -350px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  mb-5">
                <div class="meeting-single-item">
                    @if (!$article->image)
                    <img src="{{asset('image/img_default.jpg')}}" style="height: 400px; object-fit: cover;" alt="">
                    @else
                    <img class="img-fluid object-fit-cover" src="{{asset('image/article/'.$article->image)}}" style="height:400px;" alt="">
                    @endif
                    <div class="text-center">
                        <h4 class="fs-2 mt-4">{{$article->title}}</h4>
                        <p class="text-secondary">By: Admin | {{Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('DD MMMM YYYY')}}</p>
                    </div>

                    <div class="col-lg-4 mt-5 mb-2 ms-4 float-md-end" id="recent-article">
                        <h4 class="d-flex justify-content-center mb-3">Artikel Terkait</h4>
                        <hr>
                        @foreach ($related as $relate)

                        <div class="card mt-2" style="border: none;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{asset('image/article/'.$relate->image)}}" class="img-fluid " alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a class="text-dark" href="{{route('article.slug',$relate->slug)}}">
                                            <h6 class="card-title">{{$relate->title}}</h6>
                                        </a>
                                        <p class="card-text"></p>
                                        <p class="card-text"><small class="text-body-secondary">
                                                <i class="far fa-clock"></i> {{$relate->created_at->diffForHumans()}}</small></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach

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
                                    <a class="text-primary" href="#" data-sharer="twitter" data-title="{{$article->title}}" data-hashtags="trilogikaedutama" data-url="https://trilogikaedutama.id/article/{{$article->slug}}">
                                        <i class="fab fa-twitter" style="font-size: xx-large;"></i>
                                    </a>
                                </div>
                                <div class="me-3">
                                    <a class="text-success" href="#" data-sharer="whatsapp" data-title="{{$article->title}}" data-url="https://trilogikaedutama.id/article/{{$article->slug}}">
                                        <i class="fab fa-whatsapp-square" style="font-size: xx-large;"></i>
                                    </a>
                                </div>
                                <div class="me-3">
                                    <a class="text-primary" href="#" data-sharer="linkedin" data-url="https://trilogikaedutama.id/article/{{$article->slug}}">
                                        <i class="fab fa-linkedin" style="font-size: xx-large;"></i>
                                    </a>
                                </div>
                                <div class="me-3">
                                    <a class="text-primary" href="#" data-sharer="telegram" data-title="{{$article->title}}" data-url="https://trilogikaedutama.id/article/{{$article->slug}}">
                                        <i class="fab fa-telegram" style="font-size: xx-large;"></i>
                                    </a>
                                </div>
                                <div class="me-3">
                                    <i class="fas fa-link" style="cursor: pointer; font-size: xx-large;" onclick="copyURL(this)" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied"></i>
                                </div>

                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
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