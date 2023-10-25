@extends('layouts.main')
@section('style')
    <style>
        footer {
            background-image: url("{{ asset('front/assets') }}/images/meetings-bg.jpg");
            background-position: center center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }

        section.heading-page {
            padding-top: 230px;
            padding-bottom: 110px;
            text-align: center;
            filter: grayscale(70%) brightness(50%);
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

        /* Google Font CDN Link */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .body {
            min-height: 100vh;
            width: 100%;
            background: #ffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-dua {
            width: 85%;
            background: #fff;
            border-radius: 6px;
            padding: 20px 60px 30px 40px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .container-dua .content-dua {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container-dua .content-dua .left-side {
            width: 25%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            position: relative;
        }

        .content-dua .left-side::before {
            content: "";
            position: absolute;
            height: 70%;
            width: 2px;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: #1f262c;
        }

        .content-dua .left-side .details {
            margin: 14px;
            text-align: center;
        }

        .content-dua .left-side .details i {
            font-size: 30px;
            color: #1f262c;
            margin-bottom: 10px;
        }

        .content-dua .left-side .details .topic {
            font-size: 18px;
            font-weight: 500;
        }

        .content-dua .left-side .details .text-one,
        .content-dua .left-side .details .text-two {
            font-size: 14px;
            color: #1f262c;
        }

        .container-dua .content-dua .right-side {
            width: 75%;
            margin-left: 75px;
        }

        .content-dua .right-side .topic-text {
            font-size: 23px;
            font-weight: 600;
            color: #1f262c;
        }

        .right-side .input-box {
            height: 50px;
            width: 100%;
            margin: 12px 0;
        }

        .right-side .input-box input,
        .right-side .input-box textarea {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            background: #f1f1f1;
            border-radius: 6px;
            padding: 0 15px;
            resize: none;
        }

        .right-side .message-box {
            min-height: 110px;
        }

        .right-side .input-box textarea {
            padding-top: 6px;
        }

        .right-side .button {
            display: inline-block;
            margin-top: 12px;
        }

        .right-side .button input[type="button"] {
            color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: #1f262c;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button input[type="button"]:hover {
            background: #1f262c;
        }

        @media (max-width: 950px) {
            .container-dua {
                width: 90%;
                padding: 30px 40px 40px 35px;
            }

            .container-dua .content-dua .right-side {
                width: 75%;
                margin-left: 55px;
            }
        }

        @media (max-width: 820px) {
            .container-dua {
                margin: 40px 0;
                height: 100%;
            }

            .container-dua .content-dua {
                flex-direction: column-reverse;
            }

            .container-dua .content-dua .left-side {
                width: 100%;
                flex-direction: row;
                margin-top: 40px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .container-dua .content-dua .left-side::before {
                display: none;
            }

            .container-dua .content-dua .right-side {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>



@endsection
@section('content')
    <section class="heading-page header-text" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>CONTACT US</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="meetings-page" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5" style="">
                    <div class="meeting-single-item">
                        <!-- contactus -->
                        <div class="container container-dua align-items-center justify-content-center">
                            <div class="content-dua">
                                <div class="left-side">
                                    <div class="address details">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <div class="topic">Alamat</div>
                                        <div class="text-one">
                                            Jl. Lingkar Barat Siliwangi, Nogosaren, RT.05/RW.22
                                        </div>
                                        <div class="text-two">
                                            Nogotirto, Gamping, Sleman, D.I. Yogyakarta
                                        </div>
                                    </div>
                                    <div class="phone details">
                                        <i class="fas fa-phone-alt"></i>
                                        <div class="topic">Telp.</div>
                                        <div class="text-one">
                                            <a href="tel://+6285701246319">0857-0124-6319</a>
                                        </div>
                                    </div>
                                    <div class="email details">
                                        <i class="fas fa-envelope"></i>
                                        <div class="topic">Email</div>
                                        <div class="text-one">
                                            <a href="trilogikaedutamayk@gmail.com">trilogikaedutamayk@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-side">
                                    <div class="topic-text">Send us a message</div>
                                    <p>
                                        If you have any work from me or any types of quries related to my
                                        tutorial, you can send me message from here. It's my pleasure to
                                        help you.
                                    </p>
                                    <form action="#">
                                        <div class="input-box">
                                            <input type="text" placeholder="Enter your name" />
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Enter your email" />
                                        </div>
                                        <div class="input-box message-box">
                                            <textarea placeholder="Enter your message"></textarea>
                                        </div>
                                        <div class="button">
                                            <input type="button" value="Send Now" />
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- maps -->

                            <div class="content-dua"
                                style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
                                <div class="container container-dua" style="text-align: center">
                                    <div id="map"></div>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.143854955198!2d110.32859587450912!3d-7.7745667771267195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5926ebf3cd91%3A0x84837300a36becd1!2sTrilogika%20Edutama!5e0!3m2!1sid!2sid!4v1698207752831!5m2!1sid!2sid"
                                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
