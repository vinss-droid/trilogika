@extends('layouts.admin.main')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
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

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Course Management</h4>
        <!-- <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah</button> -->
        <a href="{{route('course.create')}}" class="btn btn-success mt-2">Tambah</a>
    </div>
    <div class="card-content">
        <!-- table head dark -->
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>Judul</th>
                        <th>Image</th>
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
<script>
    
$(document).ready(function() {
    $('.updateStatusBtn').click(function(event) {
        event.preventDefault(); // Mencegah tindakan default dari link
        var id = $(this).data('id'); 
        // Kirim permintaan AJAX untuk memperbarui status
        $.ajax({
            url: '{{ route("course.status",":id") }}'.replace(':id', id),
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {
                // Kirim data apa pun yang Anda butuhkan untuk menentukan status
                _method: 'PATCH', // Menggunakan metode PUT
            },
            success: function(response) {
                // Toggle kelas-kelas untuk tombol
                $(this).toggleClass('btn-primary btn-secondary');
                // Toggle ikon tombol
                $(this).find('i').toggleClass('bi-eye bi-eye-slash');
                // Tampilkan pesan sukses atau perbarui tampilan jika perlu
                // console.log(response);
            }.bind(this), // Mengikat konteks klik tombol
            error: function(xhr, status, error) {
                console.error('There has been a problem with your AJAX request:', error);
            }
        });
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
            fetch('/admin/course/' + postId, {
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