@extends('layouts.main')
@php
setlocale(LC_TIME, 'id_ID');
App::setLocale('id');
@endphp
@section('style')
<style>
    /* html,
    body {
        background: var(--bs-gray-300);
        font-family: 'Poppins', sans-serif;
    } */

    footer {
        background-image: none;
        /* background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg"); */
        background: var(--bs-white);
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    section.heading-page {
        background-image: none;
        /* background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg"); */
        background-color: var(--bs-white);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 300px;
        padding-bottom: 110px;
        text-align: center;
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
        background-color: var(--bs-white);
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

    .list-group {
        --bs-list-group-border-width: 0;
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
<section class="" style="margin-top: -350px;">
    <div class="container">
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-4">
                <h3>Upcoming Program</h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-9 ">
                @foreach ($programs as $program)
                <div class="card mb-3 border border-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset('image/program/'.$program->image)}}" class="img-fluid h-100 object-fit-cover" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$program->title}} <span class="badge bg-primary fw-medium">{{$program->status}}</span></h5>
                                <p class="card-text">{!!Str::words(strip_tags($program->content),20,' ...')!!}</p>
                                <p class="card-text">
                                    <small class="text-body-secondary me-2"><i class="far fa-calendar-alt"></i> {{Carbon\Carbon::parse($program->created_at)->locale('id')->isoFormat('DD MMMM YYYY')}}</small>
                                    <small class="text-body-secondary"><i class="far fa-clock"></i> {{$program->updated_at->diffForHumans()}}</small>
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('program.slug',$program->slug)}}" class="btn btn-sm btn-primary">Lihat detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$programs->links()}}
            </div>
            <div class="col-lg-3 border-start border-2 border-dark-subtle">
                <form class="d-flex mb-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="card border-0 mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Kategori</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Pendidikan
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sertifikasi
                                <span class="badge bg-primary rounded-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Diklat
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="card border-0 mb-3">
                    <img src="{{asset('image/course/ekonomi.jpg')}}" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pelatihan & Sertifikasi</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Basic Digital Marketing</h6>
                        <p class="card-text">Kegiatan pemasaran produk menggunakan media digital atau internet dengan tujuan untuk menarik konsumen secara cepat.</p>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Daftar</a>
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