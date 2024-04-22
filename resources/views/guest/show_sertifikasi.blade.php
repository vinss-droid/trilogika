@extends('layouts.admin.main')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $schemas->judul }}</h3>
                <p class="text-subtitle text-muted">Jenis : {{ $schemas->jenis }}</p>
                <p class="text-subtitle text-muted">Nomor : {{ $schemas->nomor }}</p>
            </div>
            {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                    </ol>
                </nav>
            </div> --}}
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $schemas->judul }}</h4>
            </div>
            <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam quaerat similique iusto
                temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic deleniti? Placeat delectus
                quibusdam ratione ullam!
                    
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <TH>NO</TH>
                                    <th>KODE</th>
                                    <th>JUDUL</th>
                                    <th>JENIS STANDAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schemas->unitKompetensis as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $unit->kode }}</td>
                                    <td>{{ $unit->judul }}</td>
                                    <td class="text-bold-500">{{ $unit->jenis_standar }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
            </div>
            <div class="card-footer">
                <a href="{{ route('all.sertifikasi') }}" class="btn btn-primary">Kembali ke Skema</a>
                <a href="#" class="btn btn-primary">Daftar</a>
            </div>
        </div>
    </section>
</div>
@endsection