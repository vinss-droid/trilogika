@extends('layouts.admin.main')
@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    body.theme-dark p {
        margin-bottom: 0rem;
        margin-top: 0;
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
                            <div id="editor" style="height: 240px;">{!!$course->content!!}
                            </div>
                            <textarea name="content" id="quill-content" hidden></textarea>
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
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Tambahkan event listener ke form untuk mengisi nilai input teks saat formulir dikirim
    document.querySelector('#form').addEventListener('submit', function() {
        // Dapatkan isi dari editor Quill.js
        var quillContent = document.querySelector('#editor .ql-editor').innerHTML;

        // Set nilai input teks dengan konten dari Quill.js
        document.querySelector('#quill-content').value = quillContent;
    });
</script>
@endsection