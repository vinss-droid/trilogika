@extends('layouts.admin.main')
@section('content')
<div class="page-content">
   
    <div class="page-heading">
        <h3 class="text-capitalize">{{ Auth::user()->name }} Dashboard</h3>
    </div> 
    <div class="page-content"> 
        <section class="row">
            <div class="col-12 col-lg-3">
                <a href="">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-primary avatar-xl me-3">
                                <span class="avatar-content fs-3">{{ Str::substr(Auth::user()->name, 0, 2)  }}</span>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Profile</h5>
                                <h6 class="text-muted mb-0">{{ Auth::user()->name }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>

            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="{{ route('form.app') }}">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <span class="btn btn-lg icon mb-2 text-white" style="background-color: var(--bs-purple)"><i class="bi bi-pencil"></i></span>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">Form</h6>
                                        <h6 class="text-muted font-semibold">Form Aplication</h6>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="#">
                        <div class="card"> 
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <span class="btn btn-lg icon btn-success mb-2"><i class="bi bi-pc-display"></i></span>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">CBT</h6>
                                        <h6 class="text-muted font-semibold">Computer Base Test</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="{{ route('berkas') }}">
                        <div class="card"> 
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <span class="btn btn-lg icon btn-success mb-2"><i class="bi bi-pc-display"></i></span>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">Berkas</h6>
                                        <h6 class="text-muted font-semibold">Berkas</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="{{ route('all.sertifikasi') }}">
                        <div class="card"> 
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <span class="btn btn-lg icon btn-warning mb-2"><i class="bi bi-folder"></i></span>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">Pendaftaran</h6>
                                        <h6 class="text-muted font-semibold">Daftar Sertifikasi</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                   
                    {{-- <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <span class="btn btn-xl icon btn-success mb-2"><i class="bi bi-pc-display"></i></span>
                                    </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">CBT</h6>
                                        <h6 class="text-muted font-semibold">Computer Base Test</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                   {{-- <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Saved Post</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- row profile visit --}}
             
          
            </div>
            
        </section>
    </div>
    
</div>
@endsection