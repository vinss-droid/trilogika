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
            <h4 class="card-title">Article Edit</h4>
        </div>
        <div class="card-body">
            <form id="form" action="{{route('article.update',$article->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <img src="{{asset('image/article/'.$article->image)}}" class="img-fluid w-100" style="height: 200px; object-fit: cover;" alt="">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="basicInput">Title</label>
                            <input type="text" value="{{$article->title}}" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="basicInput">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="basicInput">Created at</label>
                            <input type="datetime-local" name="created_at" value="{{$article->created_at}}" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="basicInput">Content</label>
                            <div id="editor" style="height: 240px;">{!!$article->content!!}
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
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        ['blockquote'],
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],

        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],
        [{
            'color': []
        }, {
            'background': []
        }],
        [{
            'align': []
        }],

    ];
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: toolbarOptions
        }
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