@extends('layouts.admin.main')
@section('style')

<!-- include summernote css/js -->
<link rel="stylesheet" href="{{asset('mazer')}}/assets/css/pages/summernote.css">
<link rel="stylesheet" href="{{asset('mazer')}}/assets/extensions/summernote/summernote-lite.css">

<style>
    body.theme-dark p {
        margin-bottom: 0rem;
        margin-top: 0;
    }

    body.theme-dark .dataTable-table,
    body.theme-dark .table {
        --bs-table-color: #1b1b1b;
    }

    .note-editor .note-editing-area .note-editable table td,
    .note-editor .note-editing-area .note-editable table th {
        border: 1px solid #3f3f3f;
    }
</style>
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">New Partner</h4>
        </div>
        <div class="card-body">
            <form id="form" action="{{route('partner.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="basicInput">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 ">
                        <div class="form-group">
                            <label for="basicInput">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="basicInput">Tanggal</label>
                            <input type="datetime-local" name="created_at" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="basicInput">Content</label>
                            <textarea name="content" id="summernote"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" id="submit-button" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')

<script src="{{asset('mazer')}}/assets/extensions/summernote/summernote-lite.min.js"></script>
<script src="{{asset('mazer')}}/assets/js/pages/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 200
        });
    });
</script>

@endsection