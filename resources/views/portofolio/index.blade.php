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

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Minimal jQuery Datatable
            </h5>
            <a href="{{route('portofolio.create')}}" class="btn btn-success mt-2">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive datatable-minimal">
                <table class="table" id="tbl_list">
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



{{-- <div class="card">
    <div class="card-header">
        <h4 class="card-title">Portofolio</h4>
       
        <a href="{{route('portofolio.create')}}" class="btn btn-success mt-2">Tambah</a>
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
                    @foreach ($portofolios as $portofolio)
                    <tr>
                        <td class="text-bold-500">{{$portofolio->title}}</td>
                        <td>{{$portofolio->created_at}}</td>
                        <td class="text-bold-500"><img class="rounded" src="{{asset('image/portofolio/'.$portofolio->image)}}" alt="" width="100px"></td>
                        <td>
                            <a href="{{route('portofolio.edit',$portofolio->id)}}" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                            <a href="" class="btn icon btn-danger" onclick="deletePost('{{$portofolio->id}}')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div> --}}

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