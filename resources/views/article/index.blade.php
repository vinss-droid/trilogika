@extends('layouts.admin.main')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('style')
<style>
    body.theme-dark p {
        margin-bottom: 0rem;
        margin-top: 0;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Artikel</div>

                <div class="card-body">
                    <a href="{{ route('article.create') }}" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Article Management</h4>
        <!-- <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah</button> -->
        <a href="{{route('article.create')}}" class="btn btn-success mt-2">Tambah</a>
    </div>
    <div class="card-content">
        <!-- table head dark -->
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>TITLE</th>
                        <th>CREATED AT</th>
                        <th>IMAGE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td class="text-bold-500">{{$article->title}}</td>
                        <td>{{$article->created_at}}</td>
                        <td class="text-bold-500"><img class="rounded" src="{{asset('image/article/'.$article->image)}}" alt="" width="100px"></td>
                        <td>
                            <a href="{{route('article.edit',$article->id)}}" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                            <a href="" class="btn icon btn-danger" onclick="deletePost('{{$article->id}}')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
 --}}

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
   $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url()->current() }}',
        order: [[ 0, "desc" ]], 
        columns: [
            { data: "DT_RowIndex"},
            { data: 'title' },
            { data: 'image' },
            {data:'action'},
        ]
    });
 });

    document.addEventListener('DOMContentLoaded', function() {
        if ("{{session('success')}}") {
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000, // Durasi toast dalam milidetik
                close: true, // Menampilkan tombol tutup
                gravity: "top", // Posisi toast (top, center, bottom)
                position: "right", // Posisi horizontal toast (left, center, right)
            }).showToast();
        }
    });

    function deletePost(postId) {
        var data = {};
        if (confirm('Apakah Anda yakin ingin menghapus posting ini?')) {
            // Menggunakan Fetch API untuk mengirim permintaan DELETE
            fetch('/admin/article/' + postId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Handle respons dari server jika diperlukan
                        console.log(response);

                    } else {
                        // Handle kesalahan jika diperlukan
                        console.error('Terjadi kesalahan:', response.statusText);
                    }
                })
                .catch(error => {
                    // Handle kesalahan jika diperlukan
                    console.error(error);
                });
        }
        location.reload();
    }
</script>
@endsection