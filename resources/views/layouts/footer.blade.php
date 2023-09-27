</section>
<footer class="border-top">
    <div class="container ">
        <div class="row  text-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3 ">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="mb-3 mb-md-0 text-white">© 2023 Trilogika Edutama</span>
                </div>
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-4"><i class="fa fa-instagram" style="font-size:xx-large;"></i></li>
                    <li class="ms-4"><i class="fa fa-facebook" style="font-size:xx-large;"></i></li>
                    <li class="ms-4"><i class="fa fa-youtube" style="font-size:xx-large;"></i></li>
                </ul>

            </div>
        </div>
    </div>
</footer>

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
</script>
</body>

</body>

</html>