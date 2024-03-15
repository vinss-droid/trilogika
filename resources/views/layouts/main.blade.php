@include('layouts.header')

<body>

    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <!-- <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p> -->
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul class="text-white">
                            <li>
                                <a href="https://www.facebook.com/trilogikaedutama">
                                    <i class="fab fa-facebook-f" style="font-size: larger;"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/trilogikaedutama/">
                                    <i class="fab fa-instagram" style="font-size: larger;"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@trilogikaedutama">
                                  <i class="fab fa-tiktok" style="font-size: larger;"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@TrilogikaEdutama">
                                    <i class="fab fa-youtube" style="font-size: larger;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.nav')
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    @yield('content')

    @include('layouts.footer')