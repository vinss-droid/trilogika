@extends('layouts.admin.main')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Daftar Data Sertifikasi</h4>
        <!-- <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah</button> -->
        <a href="#" class="btn btn-success mt-2">Tambah</a>
    </div>
    <div class="card-content">
        <!-- table head dark -->
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td class="text-bold-500">{{$loop->iteration}}</td>
                        <td class="text-bold-500">{{$course->title}}</td>
                        <td class="text-bold-500"><img class="rounded" src="{{asset('image/course/'.$course->image)}}" alt="" width="100px"></td>
                        <td>
                            @if ($course->status == 'active')
                            <a href="#" class="btn icon btn-primary updateStatusBtn "  data-id={{ $course->id }}><i class="bi bi-eye"></i></a>
                            @else
                            <a href="#" class="btn icon btn-secondary updateStatusBtn" data-id={{ $course->id }}><i class="bi bi-eye-slash"></i></a>
                            @endif
                            <a href="{{route('course.edit',$course->id)}}" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                            <a href="" class="btn icon btn-danger" onclick="deletePost('{{$course->id}}')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{asset('mazer')}}/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

@endsection