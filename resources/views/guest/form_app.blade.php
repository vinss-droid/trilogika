@extends('layouts.admin.main')
@section('style')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>

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

<form action="" method="POST">
    @csrf
<div class="row">
<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 mt-5 mb-2">
                        <h6>Data Diri</h6>
                        <hr>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" id="" class="form-control" placeholder="ex : M.Sutarno">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" id="email" class="form-control" disabled value="{{ Auth::user()->email }}" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor KTP/Paspor/NIK</label>
                                <input type="text" id="" class="form-control" placeholder="0340217xxxxxxxx">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                {{ html()->select('tempat_lahir', ['L'=>'Laki-laki','P'=>'Perempuan'])->id('tempat_lahir')->class('form-control') }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Warga Negara</label>
                                {{ html()->select('tempat_lahir', ['WNI'=>'Warga Negara Indonesia','WNA'=>'Warga Negara Asing'])->id('tempat_lahir')->class('form-control') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-2">
                        <h6>Kualifikasi Pendidikan</h6>
                        <hr>
                    </div>
                   <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Jenjang Pendidikan</label>
                            {{ html()->select('tempat_lahir', [
                                'S3'=>'Strata 3',
                                'S2'=>'Strata 2',
                                'S1'=>'Strata 1',
                                'D4'=>'Diploma 4',
                                'D3'=>'Diploma 3',
                                'D2'=>'Diploma 2',
                                'D1'=>'Diploma 1',
                                'SMA'=>'Sekolah Menegah Atas',
                                'SMK'=>'Sekolah Menegah Kejuruan',
                                'SMP'=>'Sekolah Menegah Pertama',
                                'SD'=>'Sekolah Dasar',
                                ])->id('tempat_lahir')->class('form-control') }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama Sekolah/Kampus</label>
                            <input type="text" id="" class="form-control" placeholder="Universitas Indonesia">
                        </div>
                    </div>
                   </div>
                   <div class="col-md-12 mt-5 mb-2">
                       <h6>Alamat Lengkap</h6>
                       <hr>
                   </div>
                   <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" id="" class="form-control" placeholder="082313123123">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="text" id="" class="form-control" placeholder="082313123123">
                        </div>
                    </div>
                   </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" id="" class="form-control" placeholder="Jl. Jend. Gatot Subroto no.1 RT 001/RW 001">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Provinsi</label>
                            {{ html()->select('provinces', $provinces)->id('provinces')->class('form-control choices') }}
                        </div>
                        <div class="col-md-6">
                            <label for="">Kabupaten</label>
                            <select class="form-control" id="regencies" name="regencies">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Kecamatan</label>
                            <select class="form-control" id="districs" name="districs">
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Kalurahan</label>
                            <select class="form-control" id="villages" name="villages">
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 mt-3">
                    <div class="d-flex justify-content-end">
                        <input type="submit" name="submit" id="" class="btn btn-primary me-2" value="Simpan">
                        <button type="button" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
            </div>
        </div>
    </div>
</div>
</div>
</form>
</section>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    // let choices = document.querySelectorAll(".choices");
    // let initChoice
    // for (let i = 0; i < choices.length; i++) {
    // if (choices[i].classList.contains("multiple-remove")) {
    //     initChoice = new Choices(choices[i], {
    //     delimiter: ",",
    //     editItems: true,
    //     maxItemCount: -1,
    //     removeItemButton: true,
    //     allowHTML: true
    //     })
    // } else {
    //     initChoice = new Choices(choices[i],{
    //         allowHTML: true,
    //     })
    // }
    // }

    $('#provinces').on('change', function() {
        $.ajax({
            type: 'POST',
            url: "{{ route('get_regencies') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id_province: $(this).val()
            },
            success: function(response){
               
                $('#regencies').empty();
                
                $.each(response, function(key, value){
                    $('#regencies').append($("<option></option>").attr("value", key).text(value));
                });
                
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('#regencies').on('change', function() {
        $.ajax({
            type: 'POST',
            url: "{{ route('get_districts') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id_regency: $(this).val()
            },
            success: function(response){
                $('#districs').empty();
                $.each(response, function(key, value){
                    $('#districs').append($("<option></option>").attr("value", key).text(value));
                });
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('#districs').on('change', function() {
        $.ajax({
            type: 'POST',
            url: "{{ route('get_villages') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id_district: $(this).val()
            },
            success: function(response){
                $('#villages').empty();
                $.each(response, function(key, value){
                    $('#villages').append($("<option></option>").attr("value", key).text(value));
                });
            },
            error: function(error){
                console.log(error);
            }
        });
    });




</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
        $('#provinces').select2();
    });
</script> --}}
@endsection