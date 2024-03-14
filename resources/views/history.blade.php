@extends('layouts.main')
@php
setlocale(LC_TIME, 'id_ID');
App::setLocale('id');
@endphp
@section('style')
<style>

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
        padding-top: 0px;
        padding-bottom: 0px;
        text-align: center;
    }

    section.history-page {
        background-color: var(--bs-white);
        background-size: cover;
        padding-top: 150px;
        padding-bottom: 110px;
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
<section class="history-page">
    <div class="container">
        <div class="row">
            <div class="col-9">
                    <h1 class="display-1">Sejarah</h1>
                    <p class="border-bottom border-dark-subtle border-2 my-5"></p>
            </div>
            <div class="col-3"> </div>
        </div>
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6 mb-5">
                <figure>
                    <blockquote class="blockquote">
                      <p class="fs-5">Perjalanan adalah petualangan yang membawa kita melintasi beragam pengalaman dan tantangan,
                        mencakup lebih dari sekadar perpindahan dari satu tempat ke tempat lainnya. Ia adalah sebuah proses pembelajaran yang memperluas pandangan,
                        merangsang pertumbuhan pribadi, dan membuka pintu ke dunia yang luas.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer mt-3">
                      Hazwan Iskandar Jaya |<cite title="Source Title"> Founder Trilogika Edutama</cite>
                    </figcaption>
                  </figure>
                {{-- <p style="font-size: 20px">
                    
                </p> --}}
            </div>
            <div class="col-3"></div>
                <p class="border-bottom border-dark-subtle border-2 my-5"></p>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="display-6">
                    2001        
                </h6>
            </div>
            <div class="col-4">
                <strong>Yayasan Bhakti Bangsa</strong>
                <p>
                    Yayasan Bhakti Bangsa adalah sebuah lembaga sosial yang berdiri pada tahun 2001 dengan komitmen utama dalam bidang sosial dan kemanusiaan. Berbasis di Yogyakarta,
                    yayasan ini telah menjadi salah satu pilar penting dalam upaya meningkatkan kesejahteraan masyarakat dan memperjuangkan hak-hak kemanusiaan.
                </p>
            </div>
            <div class="col-5">
                <img class="img-fluid" src="{{ asset('image/history/yayasanbhakti.jpg') }}" alt="" style="height: 30vh; object-fit: cover">
            </div>
            <p class="border-bottom border-dark-subtle border-2 my-3"></p>

            <div class="col-3">
                <h6 class="display-6">
                    2019        
                </h6>
            </div>
            <div class="col-4">
                <strong>Trilogika Edutama</strong>
                <p>
                    Trilogika Edutama adalah Lembaga Pendidikan Vokasi dan Pelatihan Ketenagakerjaan yang didirikan oleh Bapak Hazwan Iskandar Jaya, yang dulunya bernama Yayasan Bhakti Bangsa pada tahun 2001. Seiring perkembangan zaman dan kebutuhan peningkatan kompetensi sumber daya manusia yang semakin massif, maka Yayasan Bhakti Bangsa dikonversi menjadi sebuah badan usaha profit yaitu Trilogika Edutama yang diresmikan pada tahun 2019. 
                </p>
            </div>
            <div class="col-5">
                <img class="img-fluid" src="{{ asset('image/history/trilogika.JPG') }}" alt="" style="height: 30vh; object-fit: cover">
            </div>
            <p class="border-bottom border-dark-subtle border-2 my-3"></p>

            <div class="col-3">
                <h6 class="display-6">
                    2022        
                </h6>
            </div>
            <div class="col-4">
                <strong>LSP Pariwisata Indo Nusa</strong>
                <p>
                    LSP Pariwisata Indo Nusa adalah lembaga sertifikasi profesi yang didirikan oleh Asosiasi Gabungan Industri Pariwisata Indonesia (GIPI).
                    LSP ini berdiri untuk memberikan sertifikasi kepada para pihak yang bekerja di bidang pariwisata demi meningkatkan 
                    kompetensi serta mendorong tersedianya tenagakerja yang kompeten, handal, dan memiliki daya saing
                </p>
            </div>
            <div class="col-5">
                <img class="img-fluid" src="{{ asset('image/history/lsppin.JPG') }}" alt="" style="height: 30vh; object-fit: cover">
            </div>
            <p class="border-bottom border-dark-subtle border-2 my-3"></p>

            <div class="col-3">
                <h6 class="display-6">
                    2024        
                </h6>
            </div>
            <div class="col-4">
                <strong>Trilogika Beauty Academy</strong>
                <p>
                    Lembaga kursus dan pelatihan Trilogika Beauty Academy adalah salah satu lembaga yang bergerak pada bidang kursus dan pelatihan bagi masyarakat Indonesia.
                    Pendirian LKP Trilogika Beauty Academy dilatarbelakangi oleh tujuan untuk membantu pemerintah dalam memberantas pengangguran dengan memberikan
                    keterampilan yang berdaya guna bagi masyarakat, khususnya pada bidang kecantikan.
                </p>
            </div>
            <div class="col-5">
                <img class="img-fluid" src="{{ asset('image/history/tebeauty.jpg') }}" alt="" style="height: 30vh; object-fit: cover">
            </div>
            <p class="border-bottom border-dark-subtle border-2 my-3"></p>
        </div>
        <div class="row">
            {{-- <div class="col-3">
            </div> --}}
            <div class="col-4 ">
            </div>
            <div class="col-4 mt-5">
                <div class="d-flex justify-content-center">
                    <a href="#">
                        {{-- <h5 class="display-5 text-center text-dark">Join us !</h5> --}}
                        <button type="button" class="btn btn-outline-secondary"><h5 class="display-5">Join us <i class="fas fa-arrow-right"></i></h5></button>
                    </a>
                </div>
                    <p class="border-bottom border-dark-subtle border-2 mt-5"></p>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection