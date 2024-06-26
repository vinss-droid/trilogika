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

    /* recent course<1000px */
    @media (max-width: 1000px) {
        #recent-course {
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
                    <img src="{{asset('image/img_default.jpg')}}" style="height: 400px; object-fit: cover;" alt="">
                    <div class="text-center">
                        <h4 class="fs-2 mt-4">MENGAPA PERLU SERTIFIKASI ?</h4>
                    </div>
                    <div class="content">
                        <p>
                            Dalam rangka menuju Masyarakat Ekonomi ASEAN, Trilogika Edutama Yogyakarta sebagai lembaga Pendidikan Vokasi dan Pelatihan Ketenagakerjaan menyediakan berbagai skema sertifikasi Profesi untuk memeberikan Program Sertifikasi.
                        </p>
                        <p>
                            Sertifikat Kompetensi untuk membuktikan bahwa seseorang telah mempunyai kemampuan dan keahlian dalam hal Pengetahuan, Keterampilan dan Sikap Kerja yang sesuai dengan tuntutan pekerjaannya.
                        </p>
                        <p>
                            Sertifikat Kompetensi menjadi salah satu pemenuhan akan akreditasi bagi Lembaga Pendidikan. Menjadi dokumen penting dalam mengembangkan karir SDM pada kategori Kualifikasi Pekerjaan.
                        </p>
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