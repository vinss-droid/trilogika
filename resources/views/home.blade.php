@extends('layouts.main')
@section('style')
<style>
    footer {
        /* background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg"); */
        background-color: #a12c2f;
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    section.our-facts .video {
        text-align: center;
        margin-left: 70px;
        background-image: url("{{asset('image/askom.jpg')}}");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        border-radius: 20px;
        filter: sepia(70%);
    }

    section.apply-now {
        background-image: url("{{asset('front/assets/images/upn-bg.jpg')}}");
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 140px 0px;
    }

    .meeting-item .down-content h4 {
        font-size: 18px;
        color: #1f272b;
        font-weight: 600;
        display: flex;
        margin-bottom: 15px;
    }

    section.contact-us {
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 10px 0px 0px 0px;
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
                    <div class="item">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Upcoming Programs</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($programs as $program)
                    <div class="col-lg-4">
                        <a href="{{route('program.slug',$program->slug)}}">
                            <div class="meeting-item">
                                <div class="thumb">
                                    @if (!$program->image)
                                    <img src="{{asset('image/img_default.jpg')}}" alt="">
                                    @else
                                    <img src="{{asset('image/program/'.$program->image)}}">
                                    @endif
                                </div>
                                <div class="down-content">
                                    <div class="date me-2">
                                        <h6>{{Carbon\Carbon::parse($program->created_at)->locale('id')->isoFormat('MMM')}} <span>{{Carbon\Carbon::parse($program->created_at)->isoFormat('D')}}</span></h6>
                                    </div>
                                    <h4>{{$program->title}}</h4>
                                    <p>{!! strip_tags(Str::words($program->content, 15, ' ...')) !!}</p>
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

<section class="apply-now" id="apply">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="item">
                            <h3>Bagan Struktur Organisasi</h3>
                            <p>Alat yang membantu dalam menggambarkan hierarki, tanggung jawab, dan hubungan antara berbagai unit atau departemen dalam organisasi.</p>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#">Selengkapnya</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="item">
                            <h3>Galeri</h3>
                            <p>Dokumentasi dari beberapa kegiatan yang ada dilakukan oleh lembaga Trilogika Edutama</p>
                            <div class="main-button-red">
                                <div class="{{request()->segment(1) ? '': ''}}"><a href="{{ route("page.show_galeri") }}">Selengkapnya</a></div>
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

<section class="our-article" id="article">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Headlines News</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-article-item owl-carousel">
                    @foreach ($articles as $article )
                    <div class="item">
                        <div class="card border-dark">
                            <a href="{{route('article.slug',$article->slug)}}">
                                <img src="{{asset('image/article/'.$article->image)}}" class="card-img-top" alt="Gambar 1" style="height: 240px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">{{ Str::words($article->title,6)}}</h4>
                                <div class="mb-1 text-body-secondary">{{Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('DD MMMM YYYY')}}</div>
                                <p class="card-text">{!! Str::words(strip_tags($article->content), 15, ' ...') !!}</p>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-facts">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>A Few Facts About Our</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="count-area-content percentage">
                                    <div class="count-digit">99</div>
                                    <div class="count-title">Lulusan Siap Kerja</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="count-area-content">
                                    <div class="count-digit">24</div>
                                    <div class="count-title">Mentor</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="count-area-content new-students">
                                    <div class="count-digit">54</div>
                                    <div class="count-title">Murid Baru</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="video">
                    <a href="#" target="_blank"><img src="{{asset('front')}}/assets/images/play-icon.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-courses" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Popular Courses</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-courses-item owl-carousel">
                    @foreach ($courses as $course)
                    <a href="#">
                        <div class="item">
                            <img src="{{asset('image/course')}}/{{$course->image}}" alt="Course One">
                            <div class="down-content">
                                <h4>{{$course->title}}</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
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
