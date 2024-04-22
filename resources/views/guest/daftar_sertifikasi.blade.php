@extends('layouts.admin.main')
@section('style')

@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Application 01 Permohonan Sertifikasi Kompetensi</h3>
                <p class="text-subtitle text-muted">Rincian Data Pemohon Sertifikasi
                    Pada bagian ini, cantumlan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.
                    </p>
            </div>
        </div>
    </div>
<section class="section">
    <section id="content-types">
        <div class="row">
            @foreach ($schemas as $schema)
                
            <div class="col-xl-4 col-md-6 col-sm-12">
                <a href="{{ route('show.sertifikasi', $schema->id) }}">
                <div class="card">
                    <div class="card-content">
                        <img src="https://source.unsplash.com/random/400x200" class="card-img-top img-fluid" alt="singleminded" style="height: 100px object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">{{$schema->judul}}</h5>
                            <p class="card-text text-white">
                                Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes tiramisu.Gummies
                                bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.
                            </p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        
            @endforeach
        </div>
    </section>
@endsection

@section('script')

@endsection