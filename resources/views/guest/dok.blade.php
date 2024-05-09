@extends('layouts.admin.main')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Inputs</h4>
            </div>
<form action="{{ route('test.form.store') }}" method="post">
    @csrf
            <div class="card-body">
                <div class="row">
                    @foreach ($inputs as $input)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">{{ $input->label }} |</label>
                            <small> {{ $input->description }}</small>
                            <input type="hidden" name="type[]" id="" value="{{ $input->type }}">
                            <input type="{{ $input->type }}" name="path[]" class="form-control">
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </form>
        </div>
    </section>
    @endsection
