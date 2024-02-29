@extends('layouts.admin.main')
@section('style')
<link rel="stylesheet" href="{{asset('mazer')}}/assets/css/pages/summernote.css">
<link rel="stylesheet" href="{{asset('mazer')}}/assets/extensions/summernote/summernote-lite.css">


<!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
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
            <h4 class="card-title">Course Edit</h4>
        </div>
        <div class="card-body">
            <form id="form" action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="basicInput">Title</label>
                            <input type="text" value="{{$course->title}}" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="basicInput">Image</label>
                            <img src="{{asset('storage/images/course/'.$course->image)}}" class="img-thumbnail" width="100px" alt="">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="basicInput">Content</label>
                            <textarea name="content" id="summernote">{!!$course->content!!}</textarea>

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


@endsection