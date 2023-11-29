@extends('layouts.admin.main')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Course Management</h4>
        <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah</button>
    </div>
    <div class="card-content">
        <!-- table head dark -->
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>NOMOR</th>
                        <th>KODE UNIT</th>
                        <th>JUDUL UNIT</th>
                        <th>JAM PELATIHAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500"></td>
                        <td>
                            <a href="#" class="btn icon btn-primary"><i class="bi bi-book"></i></a>
                            <a href="" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                            <a href="" class="btn icon btn-danger" onclick="deletePost('{{--$course->id--}}')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection