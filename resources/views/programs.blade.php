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
        <div class="row mb-5">
            <div class="col-lg-9 ">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset('image/askom.jpg')}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="badge bg-success">Baru</span></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-sm btn-danger">Lihat detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
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