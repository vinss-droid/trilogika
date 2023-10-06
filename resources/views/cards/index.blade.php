@extends('layouts.admin.main')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Cards Management</h4>
        <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah</button>
    </div>
    <div class="card-content">
        <!-- table head dark -->
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>ICON</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $card)
                    <tr>
                        <td class="text-bold-500">{{$card->title}}</td>
                        <td>
                            {{$card->content}}
                        </td>
                        <td class="text-bold-500"><i class="{{$card->icon}}"></i></td>
                        <td>
                            <a href="javascript:void(0)" id="btn-edit-card" data-id="{{ $card->id }}" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                            <a href="#" class="btn icon btn-danger" onclick="deletePost('{{$card->id}}')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--login form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Card Form</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form action="{{route('card.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control">
                    </div>
                    <label for="icon">Icon</label>
                    <div class="form-group">
                        <input type="text" name="icon" class="form-control">
                    </div>
                    <label>Content</label>
                    <div class="form-group">
                        <textarea name="content" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formEdit" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Assessment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <!-- <input type="hidden" id="card_id"> -->
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" name="title" id="title_edit" class="form-control">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-title"></div>
                    </div>
                    <label for="icon">Icon</label>
                    <div class="form-group">
                        <input type="text" name="icon" id="icon_edit" class="form-control">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-icon"></div>
                    </div>
                    <label>Content</label>
                    <div class="form-group">
                        <textarea name="content" id="content_edit" class="form-control"></textarea>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-content"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-primary" id="update">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    //button create post event
    $('body').on('click', '#btn-edit-card', function() {

        let card_id = $(this).data('id');
        // fetch detail post with ajax
        $.ajax({
            url: `/admin/card/${card_id}/edit`,
            type: "GET",
            cache: false,
            success: function(response) {

                //fill data to form
                $('#title_edit').val(response.data.title);
                $('#icon_edit').val(response.data.icon);
                $('#content_edit').val(response.data.content);
                $('#formEdit').attr('action', `/admin/card/${response.data.id}`)

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

    function deletePost(postId) {
        var data = {};
        if (confirm('Apakah Anda yakin ingin menghapus posting ini?')) {
            // Menggunakan Fetch API untuk mengirim permintaan DELETE
            fetch('/admin/card/' + postId, {
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