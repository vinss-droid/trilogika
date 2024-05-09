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

<form action="{{ route('bukti.persyaratan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
<div class="col-lg-8">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 mt-5 mb-2">
                        <h6>Data Diri</h6>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($inputs as $input)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ $input->label }}</label><br>
                                <small class="text-muted">{{ $input->description }}</small>
                                {{-- @error($input->type)
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                                <input class="form-control" type="file" id="" name="cv">
                            </div>
                        </div>
                            
                        @endforeach
                    </div>                 
                
                <div class="col-md-12 mt-3">
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary me-2" value="Simpan">
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