@extends('layouts.main')
@section('style')
<style>
    section.our-facts {
        background-color: var(--bs-gray-900);
    }

    section.our-article {
        background-color: var(--bs-gray-900);
    }

    footer {
        /* background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg"); */
        background-color: #a12c2f;
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    section.apply-now {
        background-image: url("{{asset('front/assets/images/upn-bg.jpg')}}");
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 40px 0px;
    }

    .meeting-item .down-content h4 {
        font-size: 18px;
        color: #1f272b;
        font-weight: 600;
        display: flex;
        margin-bottom: 15px;
    }

    section.contact-us {
        background-image: none;
        background-color: var(--bs-gray-900);
        padding: 10px 0px 0px 0px;
    }

    section.our-courses {
        background-image: none;
        background-color: var(--bs-gray-900);
    }

    section.upcoming-meetings {
        background-image: none;
        background-color: var(--bs-gray-900);
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
<!-- ***** Main Banner Area Start ***** -->
<section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="{{asset('front')}}/assets/images/course-video.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="caption">
                        <h6>Selamat Datang di</h6>
                        <h2>Trilogika Edutama</h2>
                        <p>Adalah lembaga training, riset dan konsultan.
                            Sebagai lembaga prefesional yang bergerak melakukan training untuk masyarakat, Swasta maupun Pemerintahan</p>
                        <div class="main-button-red">
                            <!-- <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->

<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-service-item owl-carousel">
                    @foreach ($cards as $card)
                    <div class="item" style="height: 300px;">
                        <div class="icon">
                            <i class="{{$card->icon}}" style="font-size: 3em; color: orange;"></i>
                        </div>
                        <div class="down-content">
                            <h4>{{$card->title}}</h4>
                            <p>{{$card->content}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="section-heading">
                </div>
            </div>
            <div class="col-lg-5 text-white mb-3">
                <h1>Program Terbaru Kami</h1>
                <p class="text-white mb-2">Program ini didesain untuk meningkatkan kualitas SDM di Indonesia melalui program pendidikan yang berkualitas. Kami berkomitmen untuk membuka pintu akses pendidikan yang lebih luas untuk masyarakat</p>
                <a href="{{route('page.programs')}}" class="btn btn-lg btn-danger rounded-pill" style="background-color: #a12c2f; border: none;">
                    <p class="mx-4 text-white" style="font-size: 15px;">SELENGKAPNYA</p>
                </a>
            </div>
            <div class="col-lg-7">
                <div class="owl-program-item owl-carousel mb-5">
                    @foreach ($programs as $program )
                    
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <h2 class="badge text-dark bg-white" style="position: absolute;">
                                    {{Carbon\Carbon::parse($program->created_at)->locale('id')->isoFormat('DD MMMM YY')}}
                                </h2>
                                </p>
                                <img src="{{asset('image/program/'.$program->image)}}" class="img-fluid rounded-start" alt="..." style="max-height: 200px">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <a href="{{ route('program.slug',$program->slug) }}">
                                        <h5 class="card-title">{{$program->title}}</h5>
                                    </a>
                                    <p class="card-text">{!! strip_tags(Str::words($program->content, 12, ' ...')) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
            </div>
            <div class="d-flex justify-content-center">

            </div>
        </div>
    </div>
    </div>
</section>
{{--

<section class="apply-now" id="apply">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="item">
                            <h3>MENGAPA PERLU SERTIFIKASI ?</h3>
                            <p>
                                Dalam rangka menuju Masyarakat Ekonomi ASEAN, Trilogika Edutama Yogyakarta sebagai lembaga Pendidikan Vokasi dan Pelatihan Ketenagakerjaan menyediakan berbagai skema sertifikasi Profesi untuk memeberikan Program Sertifikasi.
                            </p>
                            <p>
                                Sertifikat Kompetensi untuk membuktikan bahwa seseorang telah mempunyai kemampuan dan keahlian dalam hal Pengetahuan, Keterampilan dan Sikap Kerja yang sesuai dengan tuntutan pekerjaannya.

                            </p>
                            <p>
                                Sertifikat Kompetensi menjadi salah satu pemenuhan akan akreditasi bagi Lembaga Pendidikan. Menjadi dokumen penting dalam mengembangkan karir SDM pada kategori Kualifikasi Pekerjaan.
                            </p>
                            <div class="main-button-red">
                                <div class=""><a href="">Daftar Sertifikasi Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordions is-first-expanded">
                    <article class="accordion">
                        <div class="accordion-head">
                            <span>Visi</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p>Lembaga yang kredibel sebagai partner dalam meningkatkan kualitas sumber Daya Manusia Indonesia berbasis kompetensi secara komprehensif</p>
                            </div>
                        </div>
                    </article>
                    <article class="accordion">
                        <div class="accordion-head">
                            <span>Misi</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p><strong>a.</strong> Menyelenggarakan berbagai studi, pelatihan (bimtek), vokasi dan pemagangan dalam bidang sumber daya manusia dan produktivitas</p>
                                <p><strong>b.</strong> Merencanakan, memasarkan, menyelenggarakan, hingga mengevaluasi program pengembangan sumber daya manusia</p>
                                <p><strong>c.</strong> Memberikan layanan terbaik dengan focus pada pemecahan masalah sumber daya manusia</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
--}}
<section class="our-facts">
    <div class="container">
        <div class="mb-3">
            <h1 class="text-white text-end">Portofolio Trilogika Edutama</h1>
            <p class="text-white text-end">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum consequuntur possimus fuga ducimus laborum ipsa dignissimos natus eveniet atque dolore.</p>
        </div>
        <div class="row g-2">
            @foreach ($portofolios as $porto)
            <div class="col-md-4">
                <div class="tiles">
                    <a href="#" class="thumbnail tile">
                        <img src="{{asset('image/portofolio/'.$porto->image)}}" style="min-height: 50vh; object-fit: cover;">
                        <div class="details">
                            <span class="title">{{$porto->title}}</span>
                            <span class="info">{!! strip_tags(Str::words($porto->content,'10','...')) !!}</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="our-courses" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Pelatihan Populer</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-courses-item owl-carousel">
                    @foreach ($courses as $course)
                    <div class="col mb-3">
                        <a href="{{route('course.slug',$course->slug)}}">
                            <div class="card border-light rounded-0 p-1 bg-transparent" style="height: 400px;">
                                <img src="{{asset('image/course')}}/{{$course->image}}" class="img-fluid object-fit-cover" alt="...">
                                <div class="card-body">
                                    <h5 class="text-uppercase text-warning fw-light">{{$course->title}}</h5>
                                    <p class="text-white" style="font-size: small;">{!! Str::words(strip_tags($course->content), 15, ' ...') !!}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-article" id="article">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-article-item owl-carousel mb-5">
                    @foreach ($articles as $article )
                    <div class="item">
                        <div class="card" style="height: 450px;">
                            <a href="{{route('article.slug',$article->slug)}}">
                                <img src="{{asset('image/article/'.$article->image)}}" class="card-img-top" alt="Gambar 1" style="height: 240px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <small class="mb-1 text-body-secondary"><i class="fas fa-user"></i> By Admin | <i class="fas fa-calendar-alt"></i> {{Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('DD MMMM YYYY')}}</small>
                                <h4 class="card-title">{{ Str::words($article->title,6)}}</h4>
                                <p class="card-text">{!! Str::words(strip_tags($article->content), 10, ' ...') !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{route('page.articles')}}" class="btn btn-lg btn-danger rounded-pill" style="background-color: #a12c2f; border: none;">
                        <p class="mx-4 text-white" style="font-size: 15px;">SELENGKAPNYA</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>

</script>
@endsection