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
                        <h2>Trilogika Erdutama</h2>
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
                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-01.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Assessment Center</h4>
                            <p>Metode untuk menggali kompetensi yang perlu dikembangkan oleh individu melalui sejumlah simulasi.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-02.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Bimbingan Teknis</h4>
                            <p>layanan bimbingan yang bertujuan meningkatkan kualitas Sumber Daya Manusia.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-03.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Computer Assisted Test</h4>
                            <p> suatu sistem yang dipakai untuk membantu proses seleksi dengan alat bantu komputer.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-02.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Management Consulting</h4>
                            <p>Untuk melakukan pembinaan manajemen dengan dua bidang usaha yaitu pelatihan dan konsultansi manajemen.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-03.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Pelatihan Berbasis Kompetensi</h4>
                            <p>jenis pelatihan yang fokus pada pengembangan kompetensi atau keterampilan spesifik untuk dapat melaksanakan tugas dengan efektif.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-01.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Pelatihan Vokasi</h4>
                            <p>Program ini memfokuskan pada pengajaran keterampilan dan praktik kerja.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('front')}}/assets/images/service-icon-02.png" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Softskill</h4>
                            <p>Keahlian bagaimana seseorang dapat berinteraksi dan bersosialisasi dengan orang lain di dalam dunia kerja.</p>
                        </div>
                    </div>

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
            <!-- <div class="col-lg-4">
                <div class="categories">
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="#">Pelatihan dan Sertifikasi</a></li>
                        <li><a href="#">Kegiatan dan Event</a></li>
                        <li><a href="#">Management Consulting</a></li>
                        <li><a href="#">Bimbingan Teknis</a></li>

                    </ul>
                    <div class="main-button-red">
                        <a href="#">All Upcoming Programs</a>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="meeting-item">
                            <div class="thumb">
                                <div class="price">
                                    <span>Dibuka</span>
                                </div>
                                <a href="#"><img src="{{asset('image/cpns.jpg')}}" alt="New Lecturer Meeting"></a>
                            </div>
                            <div class="down-content">
                                <div class="date">
                                    <h6>Sept <span>10</span></h6>
                                </div>
                                <a href="#">
                                    <h4>Siap CPNS 2023</h4>
                                </a>
                                <p>Bimbigan dan pelatihan untuk menghadapi CPNS 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="meeting-item">
                            <div class="thumb">
                                <!-- <div class="price">
                                    <span>Segera</span>
                                </div> -->
                                <a href="#"><img src="{{asset('image/jps.jpg')}}" alt="Online Teaching"></a>
                            </div>
                            <div class="down-content">
                                <div class="date">
                                    <h6>sept <span>29</span></h6>
                                </div>
                                <a href="#">
                                    <h4>Jaring Pengaman Sosial</h4>
                                </a>
                                <p>Adalah bantuan sosial yang tidak terencana berupa uang yang diberikan kepada masyarakat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="meeting-item">
                            <div class="thumb">
                                <!-- <div class="price">
                                    <span>Segera</span>
                                </div> -->
                                <a href="#"><img src="{{asset('image/askom.jpg')}}" alt="Online Teaching"></a>
                            </div>
                            <div class="down-content d-flex flex-row">
                                <div class="date">
                                    <h6>aug <span>21</span></h6>
                                </div>
                                <div class="content">
                                    <a href="#">
                                        <h4>Diklat & Sertifikasi Asesor Kompetensi BNSP</h4>
                                    </a>
                                    <p class="m-0">Diklat & Sertifikasi Asesor Kompetensi BNSP Bidang Desa Wisata, Barista, Perhotelan, Kecantikan, dan Kepemanduan Perjalanan (Tour Leader)</p>

                                </div>
                            </div>
                        </div>
                    </div>
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
                                <div class="scroll-to-section"><a href="#">Selengkapnya</a></div>
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
                    <div class="item">
                        <div class="card border-dark">
                            <img src="{{asset('front')}}/assets/images/course-01.jpg" class="card-img-top" alt="Gambar 1">
                            <div class="card-body">
                                <h5 class="card-title">Cerahnya Profesi Instruktur</h5>
                                <p class="card-text">Pemberlakuan pasar bebas Asia Tenggara atau yang disebut Masyarakat Ekonomi Asean (MEA) telah menjadikan persaingan bursa tenaga kerja semakin meningkat.</p>
                                <div class="main-button-red mt-3">
                                    <a href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card border-dark">
                            <img src="{{asset('front')}}/assets/images/course-03.jpg" class="card-img-top" alt="Gambar 1">
                            <div class="card-body">
                                <h5 class="card-title">Karakter Pekerja Istimewa Indikator Penanda Kualitas Pekerja DIY</h5>
                                <p class="card-text">Pemberlakuan pasar bebas Asia Tenggara atau yang disebut Masyarakat Ekonomi Asean (MEA) telah menjadikan persaingan bursa tenaga kerja semakin meningkat.</p>
                                <div class="main-button-red mt-3">
                                    <a href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div class="col-12">
                                <div class="count-area-content">
                                    <div class="count-digit">8</div>
                                    <div class="count-title">Awards</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="video">
                    <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{asset('front')}}/assets/images/play-icon.png" alt=""></a>
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
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-01.jpg" alt="Course One">
                        <div class="down-content">
                            <h4>Pelatihan Akuntansi</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-02.jpg" alt="Course Two">
                        <div class="down-content">
                            <h4>Pelatihan Akuntansi</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-03.jpg" alt="">
                        <div class="down-content">
                            <h4>Pelatihan Ekonomi</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-04.jpg" alt="">
                        <div class="down-content">
                            <h4>Pelatihan Manajemen SDM</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-01.jpg" alt="">
                        <div class="down-content">
                            <h4>Pelatihan Kewirausahaan</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-02.jpg" alt="">
                        <div class="down-content">
                            <h4>Pelatihan Manajemen Resiko</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front')}}/assets/images/course-03.jpg" alt="">
                        <div class="down-content">
                            <h4>Pelatihan Ritel</h4>
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-us" id="contact">
    @endsection
    @section('script')
    <script>

    </script>
    @endsection