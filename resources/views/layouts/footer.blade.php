<div class="footer">
    <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.
        <br>
        Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
        <br>
        Distibuted By: <a href="https://themewagon.com" target="_blank" title="Build Better UI, Faster">ThemeWagon</a>
    </p>
</div>
</section>

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