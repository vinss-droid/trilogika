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
                    <button data-bs-target="#modal" data-bs-toggle="modal" data class="btn btn-sm btn-success mb-2">Tambah Data</button>
                    <table id="tbl_list" class="table table-striped" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th>NO</th>
                                <th>Logo</th>
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th>SLUG</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--    Modal Create  --}}
    <div class="modal fade text-left modal-borderless" id="modal" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Create Partner</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <hr>
                <div class="modal-body container">
                    <form id="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug automatic create when title is typed!" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="img" required>
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter description" rows="6" required></textarea>
                                </div>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary ms-1" id="submit">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
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
            let title = $('#title')
            let slug = $('#slug')
            let modal = $('#modal')
            let form = $('#form')

            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                // order: [[ 0, "desc" ]],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
                    { data: 'image' },
                    { data: 'title' },
                    { data: 'description' },
                    { data: 'slug' },
                    { data:'action' },
                ]
            });

            title.on('keyup', function (e) {
                let titleValue = title.val()
                slug.val(titleValue.replace(/ /g, '-').toLowerCase())
            })

            form.on('submit', function (e) {
                e.preventDefault()
                formData = new FormData(form)

                fetch('/admin/partner', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    data: formData
                })
                .then(response => {
                    if (response.ok) {
                        Toastify({
                            text: response.message,
                            duration: 3000, // Durasi toast dalam milidetik
                            close: true, // Menampilkan tombol tutup
                            gravity: "top", // Posisi toast (top, center, bottom)
                            position: "right", // Posisi horizontal toast (left, center, right)
                        }).showToast();

                    } else {
                        // Handle kesalahan jika diperlukan
                        console.error('Terjadi kesalahan:', response.statusText);
                    }
                })
                .catch(error => {
                    // Handle kesalahan jika diperlukan
                    console.error(error);
                });
            })

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
