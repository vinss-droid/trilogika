@extends('layouts.admin.main')
@section('style')

@endsection
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Application 01</h3>
                <p class="text-subtitle text-muted">Give textual form controls like input upgrade with custom styles,
                    sizing, focus states, and more.</p>
            </div>
        </div>
    </div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Data diri</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" id="" class="form-control" placeholder="ex : M.Sutarno">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" id="" class="form-control" placeholder="Jakarta">
                            </div>
                        </div>
                        <div class="col-md-8">
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
                                <input type="text" id="" class="form-control" placeholder="Laki-laki">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Warga Negara</label>
                                <input type="text" id="" class="form-control" placeholder="WNI">
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Jenjang Pendidikan</label>
                            <input type="text" id="" class="form-control" placeholder="D3">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama Sekolah/Kampus</label>
                            <input type="text" id="" class="form-control" placeholder="Universitas Indonesia">
                        </div>
                    </div>
                   </div>
                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input type="text" id="" class="form-control" placeholder="082313123123">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" id="" class="form-control" placeholder="Jl. Jend. Gatot Subroto no.1 RT 001/RW 001">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ html()->select('provinces', $provinces)->class('form-control') }}
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disabledInput">Disabled Input</label>
                        <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="readonlyInput">Readonly Input</label>
                        <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                            value="You can't update me :P">
                    </div>

                    <div class="form-group">
                        <label for="disabledInput">Static Text</label>
                        <p class="form-control-static" id="staticInput">email@mazer.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection