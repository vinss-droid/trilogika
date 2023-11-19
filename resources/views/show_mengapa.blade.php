@extends('layouts.main')
@php
setlocale(LC_TIME, 'id_ID');
App::setLocale('id');
@endphp
@section('style')
<style>
    footer {
        background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg");
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    section.heading-page {
        background-image: none;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 300px;
        padding-bottom: 110px;
        text-align: center;
        filter: grayscale(70%) brightness(50%);
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

    /* recent course<1000px */
    @media (max-width: 1000px) {
        #recent-course {
            display: none;
        }
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
<section class="bg-white" style="margin-top: -350px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  mb-5">
                <div class="meeting-single-item">
                    <img src="{{asset('image/img_default.jpg')}}" style="height: 400px; object-fit: cover;" alt="">
                    <div class="text-center">
                        <h4 class="fs-2 mt-4">MENGAPA PERLU SERTIFIKASI ?</h4>
                    </div>
                    <p class="description mb-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ad totam rem aspernatur, quae magni, dignissimos ducimus officia rerum, fugit excepturi tempora non vitae consequatur sint optio nulla praesentium accusamus sequi ipsam magnam commodi? Laudantium nulla corporis iure deleniti cupiditate quis itaque. Nisi, deserunt cumque. Quo sequi iste soluta laboriosam cum explicabo iusto modi quia natus unde voluptatum ex nihil amet a, fugit voluptatem non molestiae placeat pariatur perspiciatis blanditiis eos? Ullam exercitationem voluptatum at ipsa sit? Illo, voluptatibus quibusdam animi aliquid debitis non in explicabo omnis maiores temporibus aperiam minima eveniet laboriosam! Minima eligendi accusamus iure possimus, recusandae eius laboriosam minus blanditiis dolore exercitationem nihil sunt dolor accusantium. Quia, excepturi nobis eos sed nihil sapiente dolore commodi voluptates amet maiores incidunt odit cum. Cumque dolor dolore nostrum aut voluptates error accusantium libero aspernatur reprehenderit odio. Iure, expedita beatae tempore placeat laborum minima dolores. Fuga cum explicabo ipsum mollitia, consequatur illum voluptatibus. Nobis eveniet velit et provident consequatur, magni magnam nam harum, cumque doloribus ad, voluptatum sapiente. Rem maiores nam magni reiciendis quibusdam modi dolorem dolore eligendi eos ea hic quaerat totam cumque consequatur voluptas, incidunt inventore iste odio quam quisquam? Voluptatibus quis quae adipisci neque dignissimos laboriosam minus sapiente recusandae laborum ullam placeat eveniet quia tempora reiciendis eius enim, reprehenderit voluptatum asperiores dolorem iusto. Quisquam consequatur quo ipsum error eaque, accusantium nisi quasi expedita natus dignissimos in assumenda minima, deserunt possimus temporibus ad libero tempora iste ea fugiat veniam veritatis! Asperiores, doloremque earum optio culpa cum voluptatum ipsa fuga eveniet excepturi dolores sequi adipisci dignissimos at omnis officiis laboriosam enim atque non possimus voluptates ea? A molestiae accusantium pariatur ad atque architecto nulla expedita ratione eos voluptate tempora porro, quasi exercitationem itaque blanditiis fuga! Quidem distinctio esse sit? Rem dolorum dolor, laborum ratione assumenda unde, libero beatae, nobis neque debitis nesciunt placeat? Molestias, quia fuga? Ad voluptatum omnis voluptates commodi unde maxime delectus cum incidunt ipsum amet harum repellat, atque adipisci, iure accusantium? Magnam nisi aliquam, rerum porro ipsa animi architecto minima dolores fugiat velit earum veritatis. Unde accusamus iure provident delectus molestiae tempora, in necessitatibus velit quia aut corporis suscipit eligendi consectetur minima eaque totam exercitationem magni ducimus ad, libero expedita cupiditate consequuntur quas autem? Est, dolore? Cum nihil repellat enim ducimus, cupiditate odio harum neque velit, ipsam pariatur excepturi sunt optio qui rerum, ea inventore? Doloremque fugit deleniti ipsa similique fugiat, deserunt eius unde vitae blanditiis facere. Pariatur quasi quidem blanditiis quia. Delectus atque praesentium odio accusamus voluptatum voluptate. Eveniet aliquid quia velit tenetur dolor corporis quam culpa, accusamus, perferendis voluptatum ipsum dignissimos odit ratione cupiditate eius, assumenda iusto. Iusto illum voluptatem, fugiat et distinctio aperiam, neque commodi repellendus vel, corrupti culpa tempora mollitia omnis dolor! Nam repudiandae nulla voluptatum explicabo illo accusamus debitis sed fugiat at numquam harum rem culpa adipisci vitae ut quod ipsum necessitatibus illum aperiam dicta, dolores ullam laborum tenetur voluptates? Ducimus deleniti consequatur reiciendis obcaecati, dolorem nostrum molestiae quasi doloremque qui quis. Consectetur officiis adipisci earum id odit veritatis, vero impedit alias?
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
<script>
    // popover
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });

    function copyURL(icon) {
        var currentURL = window.location.href;

        var tempInput = document.createElement("input");
        tempInput.value = currentURL;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        console.log("URL copied: " + currentURL)
        icon.classList.add('text-secondary');
    }
</script>
@endsection