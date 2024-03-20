@extends('layouts.admin.main')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('mazer')}}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{asset('mazer')}}/assets/compiled/css/table-datatable-jquery.css">
<style>
    body.theme-dark p {
        margin-bottom: 0rem;
        margin-top: 0;
    }
</style>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Daftar Portofolio</div>

            <div class="card-body">
                <a href="{{ route('portofolio.create') }}" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                <table id="tbl_list" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JUDUL</th>
                        <th>GAMBAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{asset('mazer')}}/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('mazer')}}/assets/static/js/pages/datatables.js"></script>
<script>
    $(document).ready(function () {
   $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url()->current() }}',
        // order: [[ 0, "desc" ]], 
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
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
            fetch('/admin/portofolio/' + postId, {
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