<section class="contact-us" id="contact">
    <footer class="text-white border-top text-center text-lg-start" style="background-color: #23242a;">
        <!-- Grid container -->
        <div class="container ">
            <!--Grid row-->
            <div class="row mt-2">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Tentang Kami</h5>
                    <p class="text-white">
                        Adalah lembaga training, riset dan konsultan. Sebagai lembaga prefesional yang bergerak melakukan training untuk masyarakat, Swasta maupun Pemerintahan
                    </p>
                    <div class="mt-4">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/trilogikaedutama?locale=id_ID" type="button" class="btn btn-floating btn-danger btn-lg"><i class="fab fa-facebook-f"></i></a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/trilogikaedutama" type="button" class="btn btn-floating btn-danger btn-lg"><i class="fab fa-instagram"></i></a>
                        <!-- Google + -->
                        <a href="https://www.youtube.com/@TrilogikaEdutama" type="button" class="btn btn-floating btn-danger btn-lg"><i class="fab fa-youtube"></i></a>

                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4 pb-1">Alamat</h5>
                    <ul class="fa-ul" style="margin-left: 1.65em;">
                        <li class="mb-3">
                            <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Jl. Nogosaren Kidul, Nogosaren, Nogotirto, Gamping, Sleman, DI Yogyakarta 55592</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li">
                                <a class="text-white" href="mailto:trilogikaedutamayk@gmail.com">
                                    <i class="fas fa-envelope"></i></span><span class="ms-2 ">trilogikaedutamayk@gmail.com</span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">0857-0124-6319</span>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Jam Kerja</h5>
                    <ul>
                        <li>Senin - Jumat</li>
                        <li>08:00 - 16.30</li>
                    </ul>
                    <!-- <div class="">
                        <p class="text-white">Senin - Jumat:</p>
                        <p class="text-white">08:00 - 16.30</p>
                    </div> -->

                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="#"> Trilogika Edutama</a>
        </div>
        <!-- Copyright -->
    </footer>
</section>
<div id="WhatsApp"></div>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('front')}}/assets/js/isotope.min.js"></script>
<script src="{{asset('front')}}/assets/js/owl-carousel.js"></script>
<script src="{{asset('front')}}/assets/js/lightbox.js"></script>
<script src="{{asset('front')}}/assets/js/tabs.js"></script>
<script src="{{asset('front')}}/assets/js/video.js"></script>
<script src="{{asset('front')}}/assets/js/slick-slider.js"></script>
<script src="{{asset('front')}}/assets/js/custom.js"></script>
<script src="{{asset('front/assets/js/floating-wpp.min.js')}}"></script>
@yield('script')
<script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
        var
            direction = section.replace(/#/, ''),
            reqSection = $('.section').filter('[data-section="' + direction + '"]'),
            reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
            $('body, html').animate({
                    scrollTop: reqSectionPos
                },
                800);
        } else {
            $('body, html').scrollTop(reqSectionPos);
        }

    };

    var checkSection = function checkSection() {
        $('.section').each(function() {
            var
                $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
                var
                    currentId = $this.data('section'),
                    reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                reqLink.closest('li').addClass('active').
                siblings().removeClass('active');
            }
        });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
        e.preventDefault();
        showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
        checkSection();
    });

    $(function() {
        $('#WhatsApp').floatingWhatsApp({
            phone: '6285701246319',
            position: 'right',
            popupMessage: 'Hallo kak, Ada yang bisa kami bantu?',
            showPopup: true,
            zIndex: 99,
        });
    });
</script>
</body>

</html>