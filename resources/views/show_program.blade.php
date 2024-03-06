@extends('layouts.main')
@section('style')
<style>
    section.contact-us {
        background-image: none;
        background-color: var(--bs-gray-900);
        padding: 10px 0px 0px 0px;
}
    section.meetings-page {
        background-image: none;
        background-color: var(--bs-gray-900);
    padding-top: 140px;
    padding-bottom: 0px;
}
    footer {
        /* background-image: url("{{asset('front/assets')}}/images/meetings-bg.jpg"); */
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    section.heading-page {
        background-image: url('{{ $program->image ? asset("image/program/".$program->image) : asset("image/img_default.jpg")}}');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
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
</style>
@endsection
@section('content')
<section class="heading-page header-text" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6>1</h6>
                <h2>1</h2>
            </div>
        </div>
    </div>
</section>
<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5" style="margin-top: -400px;">
                <div class="meeting-single-item">
                    <div class="thumb">
                        <div class="date">
                            <h6>{{Carbon\Carbon::parse($program->start_date)->locale('id')->isoFormat('D MMM')}}<span>{{Carbon\Carbon::parse($program->created_at)->locale('id')->isoFormat('YYYY')}}</span></h6>
                        </div>
                        @if (!$program->image)
                        <img src="{{asset('image/img_default.jpg')}}" style="height: 400px; object-fit: cover;" alt="">
                        @else
                        <img src="{{asset('image/program/'.$program->image)}}" style="height:400px; object-fit: cover;" alt="">
                        @endif
                    </div>
                    <div class="down-content">
                        <div class="text-center">
                            <h4 class="fs-2 ">{{$program->title}}</h4>
                            <p class="text-secondary">By: Admin | {{Carbon\Carbon::parse($program->update_at)->locale('id')->isoFormat('DD MMMM YYYY')}}</p>
                        </div>
                        <p class="description mb-5">
                            {!!$program->content!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection