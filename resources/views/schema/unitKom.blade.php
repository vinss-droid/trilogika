@extends('layouts.admin.main')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
{{-- <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
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
                <div class="card-header"><h5>Daftar Unit Kompetensi Skema {{ $schema->judul }}</h5></div>
                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#large">Tambah Data</a>
                    <table id="tbl_list" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Nomor</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-bold-500">{{$unit->kode}}</td>
                            <td>{{ $unit->judul }}</td>
                            <td class="text-bold-500">{{ $unit->jenis_standar }}</td>
                            <td>
                                
                                <a href="#" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn icon btn-danger" onclick="deleteUnit('{{ $unit->id }}')"><i class="bi bi-trash"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

<!--Modal lg size -->
<div class="me-1 mb-1 d-inline-block">
    <!-- Button trigger for large size modal -->
        <!--large size Modal -->
    <form action="{{ route('unit-kompetensi.store') }}" method="post" id="">
        @csrf
        <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Skema</label>
                        <input type="text" class="form-control" value="{{ $schema->judul }}" disabled>
                        <input type="text" name="schema_id" id="" value="{{ $schema->id }}" hidden>
                        <label for="">Kode</label>
                        <input type="text" name="kode" class="form-control">
                        <label for="">Judul</label>
                        <input type="text" name="judul" class="form-control">
                        <label for="">Jenis Standar</label>
                        <select name="jenis_standar" id="jenis_standar" class="form-control">
                            <option value="Standar Khusus">Standar Khusus</option>
                            <option value="Standar Internasional">Standar Internasional</option>
                            <option value="SKKNI">SKKNI</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1"
                            data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="me-1 mb-1 d-inline-block">
    <!-- Button trigger for large size modal -->
        <!--large size Modal -->
    <form action="#" method="post" id="">
        @csrf
        <div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Judul</label>
                       
                        <input type="text" name="judul" class="form-control" id="judul">
                        <label for="">Nomor</label>
                        <input type="text" name="nomor" class="form-control" id="nomor">
                        <label for="">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control ">
                            <option value="kkni">KKNI</option>
                            <option value="klaster">Klaster</option>
                            <option value="okupasi">Okupasi</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1"
                            data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@section('script')
{{-- <script src="{{asset('mazer')}}/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{asset('mazer')}}/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
{{-- <script src="{{asset('mazer')}}/assets/static/js/pages/datatables.js"></script> --}}
<script>

        // $(document).ready(function () {
        //    $('#tbl_list').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: "#",
        //             type: 'GET',
        //         },
        //         order: [[ 0, "desc" ]], 
        //         columns: [
        //             { data: "DT_RowIndex"},
        //             { data: 'judul' },
        //             { data: 'nomor' },
        //             { data: 'jenis'},
        //             { data: 'action'},
        //         ]
        //     });
        //  });
  

$('body').on('click', '#btn-edit-post', function () {

let id = $(this).data('id');

//fetch detail post with ajax
$.ajax({
    url: `/admin/schema/${id}/edit`,
    type: "GET",
    cache: false,
    success:function(response){

        //fill data to form
        $('#judul').val(response.data.judul);
        $('#nomor').val(response.data.nomor);
        $('#jenis option').each(function() {
                // Jika nilai opsi cocok dengan nilai yang diterima dari respons JSON
                if ($(this).val() == response.data.jenis) {
                    // Atur opsi tersebut sebagai yang dipilih
                    $(this).prop('selected', true);
                } else {
                    // Pastikan opsi tersebut tidak dipilih
                    $(this).prop('selected', false);
                }
            });

        //open modal
        $('#modal-edit').modal('show');
    }
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

    function deleteUnit(id) {
        var data = {};
        if (confirm('Apakah Anda yakin ingin menghapus unit kompetensi ini?')) {
            // Menggunakan Fetch API untuk mengirim permintaan DELETE
            fetch('/admin/unit-kompetensi/' + id, {
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