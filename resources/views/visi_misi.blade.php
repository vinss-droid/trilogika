@extends('layouts.main')
@section('style')
<style>
    footer {
        background-image: none;
        background-color: var(--bs-gray-900);
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }
    section.heading-page h2 {
    margin-top: 20px;
    margin-bottom: 20px;
    font-size: 36px;
    text-transform: uppercase;
    font-weight: 800;
    color:var(--bs-gray-900);
    letter-spacing: 1px;
    }
    section.meetings-page {
    background-image: none;
    background-color:  var(--bs-gray-900);
    padding-top: 140px;
    padding-bottom: 0px 
    }
    section.heading-page {
      background-color: var(--bs-gray-900);
      background-image: none;
        padding-top: 230px;
        padding-bottom: 110px;
        text-align: left;
    }
    section.contact-us {
    background-image: none;
    background-color: var(--bs-gray-900);
    padding: 140px 0px 0px 0px;
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

    .tiles {
        /* width: 1040px; */
        font-size: 0;
        text-align: center;
        /* position: absolute; */
        top: 50%;
        /* left: 50%; */
        /* transform: translate(-50%, -50%); */
    }

    .tiles .tile {
        display: inline-block;
        margin: 10px;
        text-align: left;
        opacity: 0.99;
        overflow: hidden;
        position: relative;
        border-radius: 3px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.05);
    }

    .tiles .tile:before {
        content: "";
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8) 100%);
        width: 100%;
        height: 50%;
        opacity: 0;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 2;
        transition-property: top, opacity;
        transition-duration: 0.3s;
    }

    .tiles .tile img {
        display: block;
        max-width: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }

    .tiles .tile .details {
        font-size: 16px;
        padding: 20px;
        color: #fff;
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 3;
    }

    .tiles .tile .details span {
        display: block;
        opacity: 0;
        position: relative;
        top: 100px;
        transition-property: top, opacity;
        transition-duration: 0.3s;
        transition-delay: 0s;
    }

    .tiles .tile .details .title {
        line-height: 1;
        font-weight: 600;
        font-size: 18px;
    }

    .tiles .tile .details .info {
        line-height: 1.2;
        margin-top: 5px;
        font-size: 12px;
        font-weight: 300;
        color: #dee2e6;
    }

    .tiles .tile:focus:before,
    .tiles .tile:focus span,
    .tiles .tile:hover:before,
    .tiles .tile:hover span {
        opacity: 1;
    }

    .tiles .tile:focus:before,
    .tiles .tile:hover:before {
        top: 50%;
    }

    .tiles .tile:focus span,
    .tiles .tile:hover span {
        top: 0;
    }

    .tiles .tile:focus .title,
    .tiles .tile:hover .title {
        transition-delay: 0.15s;
    }

    .tiles .tile:focus .info,
    .tiles .tile:hover .info {
        transition-delay: 0.25s;
    }
</style>
@endsection
@section('content')
{{-- <section class="heading-page header-text" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6>&nbsp;</h6>
                <h2>&nbsp;</h2>
            </div>
        </div>
    </div>
</section> --}}
<section class="heading-page header-text" id="top">
    <div class="container py-4">    
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
          <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Visi</h1>
            <p class="col-md-8 fs-4">Lembaga yang kredibel sebagai partner dalam meningkatkan kualitas sumber Daya Manusia Indonesia berbasis kompetensi secara komprehensif</p>
            {{-- <button class="btn btn-primary btn-lg" type="button">Example button</button> --}}
          </div>
        </div>
        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/wTq7wdlWGWs?si=gwh5vNHQUFAHjCe0" title="YouTube video" allowfullscreen></iframe>
              </div>
            <div class="h-100 p-5 text-bg-dark rounded-3">
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-5 bg-body-tertiary border rounded-3">
              <h2>Misi</h2>
                <p><strong>a.</strong> Menyelenggarakan berbagai studi, pelatihan (bimtek), vokasi dan pemagangan dalam bidang sumber daya manusia dan produktivitas</p>
                <p><strong>b.</strong> Merencanakan, memasarkan, menyelenggarakan, hingga mengevaluasi program pengembangan sumber daya manusia</p>
                <p><strong>c.</strong> Memberikan layanan terbaik dengan focus pada pemecahan masalah sumber daya manusia</p>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2 class="text-white">MENGAPA PERLU SERTIFIKASI ?</h2>
                <p class="text-white">Dalam rangka menuju Masyarakat Ekonomi ASEAN, Trilogika Edutama Yogyakarta sebagai lembaga Pendidikan Vokasi dan Pelatihan Ketenagakerjaan menyediakan berbagai skema sertifikasi Profesi untuk memeberikan Program Sertifikasi.
                  Sertifikat Kompetensi untuk membuktikan bahwa seseorang telah mempunyai kemampuan dan keahlian dalam hal Pengetahuan, Keterampilan dan Sikap Kerja yang sesuai dengan tuntutan pekerjaannya.</p>
              </div>
            </div>
            <div class="col-md-6"></div>
        </div>
      </div>
</section>
    @endsection
