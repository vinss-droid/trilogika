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

    section.heading-page {
        background-image: url('{{asset("storage/images")}}/{{$program->image}}');
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
                            <h6>{{Carbon\Carbon::parse($program->created_at)->locale('id')->isoFormat('D MMM')}}<span>{{Carbon\Carbon::parse($program->created_at)->locale('id')->isoFormat('YYYY')}}</span></h6>
                        </div>
                        <a href=""><img src="{{asset('storage/images/'.$program->image)}}" style="height:400px; object-fit: cover;" alt=""></a>
                    </div>
                    <div class="down-content">
                        <a href="meeting-details.html">
                            <h4>{{$program->title}}</h4>
                        </a>
                        <!-- <p>Recreio dos Bandeirantes, Rio de Janeiro - RJ, 22795-008, Brazil</p> -->
                        <p class="description">
                            {!!$program->content!!}
                        </p>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection