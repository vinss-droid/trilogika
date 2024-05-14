@extends('layouts.main')
@section('style')
<style>

    footer {
        background-image: none;
        background-color: var(--bs-gray-900);
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }
    section.meetings-page {
    background-image: none;
    background-color:  var(--bs-gray-900);
    padding-top: 140px;
    padding-bottom: 0px 
    }
    section.heading-page {
      background-color: var(--bs-gray-900);
      background-image: none;
        padding-top: 230px;
        padding-bottom: 110px;
        text-align: center;
    }
    section.contact-us {
    background-image: none;
    background-color: var(--bs-gray-900);
    padding: 140px 0px 0px 0px;
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

    .tiles {
        /* width: 1040px; */
        font-size: 0;
        text-align: center;
        /* position: absolute; */
        top: 50%;
        /* left: 50%; */
        /* transform: translate(-50%, -50%); */
    }

    .tiles .tile {
        display: inline-block;
        margin: 10px;
        text-align: left;
        opacity: 0.99;
        overflow: hidden;
        position: relative;
        border-radius: 3px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.05);
    }

    .tiles .tile:before {
        content: "";
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8) 100%);
        width: 100%;
        height: 50%;
        opacity: 0;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 2;
        transition-property: top, opacity;
        transition-duration: 0.3s;
    }

    .tiles .tile img {
        display: block;
        max-width: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }

    .tiles .tile .details {
        font-size: 16px;
        padding: 20px;
        color: #fff;
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 3;
    }

    .tiles .tile .details span {
        display: block;
        opacity: 0;
        position: relative;
        top: 100px;
        transition-property: top, opacity;
        transition-duration: 0.3s;
        transition-delay: 0s;
    }

    .tiles .tile .details .title {
        line-height: 1;
        font-weight: 600;
        font-size: 18px;
    }

    .tiles .tile .details .info {
        line-height: 1.2;
        margin-top: 5px;
        font-size: 12px;
        font-weight: 300;
        color: #dee2e6;
    }

    .tiles .tile:focus:before,
    .tiles .tile:focus span,
    .tiles .tile:hover:before,
    .tiles .tile:hover span {
        opacity: 1;
    }

    .tiles .tile:focus:before,
    .tiles .tile:hover:before {
        top: 50%;
    }

    .tiles .tile:focus span,
    .tiles .tile:hover span {
        top: 0;
    }

    .tiles .tile:focus .title,
    .tiles .tile:hover .title {
        transition-delay: 0.15s;
    }

    .tiles .tile:focus .info,
    .tiles .tile:hover .info {
        transition-delay: 0.25s;
    }
</style>
@endsection
@section('content')
{{-- <section class="heading-page header-text" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6>&nbsp;</h6>
                <h2>&nbsp;</h2>
            </div>
        </div>
    </div>
</section> --}}
<section class="heading-page header-text" id="top">
    <div class="container">
        <div class="row">
          <h1 class="text-white mb-5">Partner Trilogika Edutama</h1>
                      @foreach ($partners as $partner)
                      <div class="col-md-4">
                          <div class="tiles">
                              <a href="#" class="thumbnail tile">
                                  <img src="{{asset('image/partnerfolio/'.$partner->image)}}" style="height: 40vh; object-fit: cover;">
                                  <div class="details">
                                      <span class="title">{{$partner->title}}</span>
                                      <span class="info">{!! strip_tags(Str::words($partner->content,'10','...')) !!}</span>
                                  </div>
                              </a>
                          </div>
                      </div>
                      @endforeach
                <div class="pagination justify-content-center">
                  {{ $partnerfolios->links() }}
                </div>
        </div>
    </div>
</section>
    @endsection
