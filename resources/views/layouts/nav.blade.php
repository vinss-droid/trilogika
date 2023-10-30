<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="index.html" class="logo" style=" font-size: 16px;">
        <img src="{{asset('front/assets/images/lpk.svg')}}" alt="" style="width: 80px; ">
        Trilogika Edutama
    </a>

    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
        <li class="{{request()->segment(1) ? '': 'scroll-to-section'}}"><a href="{{request()->segment(1) ? '/' : '#top'}}">Home</a></li>
        <li class="{{request()->segment(1) ? '': 'scroll-to-section'}}"><a href="{{request()->segment(1) ? '/' : '#meetings'}}">Programs</a></li>
        <li class="{{request()->segment(1) ? '': 'scroll-to-section'}}"><a href="{{request()->segment(1) ? '/' : '#article'}}">News</a></li>
        <li class="{{request()->segment(1) ? '': 'scroll-to-section'}}"><a href="{{request()->segment(1) ? '/' : '#courses'}}">Courses</a></li>
        <li class="{{request()->segment(1) ? '': ''}}"><a href="{{ route("page.contact") }}">Contact Us</a></li>
    </ul>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>