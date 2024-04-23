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
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalDaftar">Daftar</a>
                </div>
            </div>
        </section>
    </div>

    {{-- modal  --}}
    <div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="modalDaftarTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form action="{{ route('daftar.sertifikasi') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDaftarTitle">Data sertifikasi</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <p><b>Judul :</b> {{ $schemas->judul }}</p>
                            </div>
                            <div class="col">
                                <p><b>Nomor :</b> {{ $schemas->nomor }}</p>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h5>Tujuan Assessment</h5>
                                <p>Pilih tujuan sertifikasi sesuai dengan pengalaman yang anda miliki.</p>

                                <input type="text" name="schema_id" id="" hidden value="{{ $schemas->id }}">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tujuan" id="flexRadioDefault1"
                                        value="sertifikasi">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Sertifikasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tujuan" id="flexRadioDefault2"
                                        value="sertifikasi_ulang">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Sertifiksasi Ulang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tujuan" id="flexRadioDefault3"
                                        value="pengakuan_kompetensi_terkini">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Pengakuan Kompetensi Terkini (PKT)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tujuan" id="flexRadioDefault4"
                                        value="rekognisi_pembelajaran_lampau">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        Rekognisi Pembelajaran Lampau
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tujuan" id="flexRadioDefault5"
                                        value="lainnya">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Lainnya
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" id="submitButton" class="btn btn-primary ms-1" data-bs-dismiss="modal" disabled>
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Daftar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('input[type=radio]').change(function() {
                if ($('input[type=radio]:checked').length > 0) {
                    $('#submitButton').prop('disabled', false);
                } else {
                    $('#submitButton').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
