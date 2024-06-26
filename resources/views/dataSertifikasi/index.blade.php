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
                            <th>Nomor Skema</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td class="text-bold-500">{{ $loop->iteration }}</td>
                                <td class="text-bold-500">{{ $data->nama }}</td>
                                <td class="text-bold-500">{{ $data->nomor_schema }}</td>
                                <td class="text-bold-500">{{ $data->judul_schema }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#" id="btnDiterima" data-id="{{ $data->data_id }}"
                                            data-status="diterima"
                                            class="btn {{ $data->status == 'diterima' ? 'btn-success' : 'btn-secondary' }}">Diterima</a>
                                        <a href="#" id="btnTidakDiterima" data-id="{{ $data->data_id }}"
                                            data-status="tidak diterima"
                                            class="btn {{ $data->status == 'tidak diterima' ? 'btn-success' : 'btn-secondary' }}">Tidak
                                            Diterima</a>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">Berkas</a>
                                    {{-- @if ($data->status == 'daftar')
                            <a href="#" class="btn icon btn-secondary updateStatusBtn" data-id={{ $data->id }}><i class="bi bi-square"></i> Rekomendasi</a>
                            @elseif ($data->status == 'diterima')
                            <a href="#" class="btn icon btn-success updateStatusBtn "  data-id={{ $data->id }}><i class="bi bi-eye"></i></a>
                            @else
                            <a href="#" class="btn icon btn-danger updateStatusBtn "  data-id={{ $data->id }}><i class="bi bi-eye"></i></a>
                            @endif --}}
                                    {{-- <a href="#" class="btn icon btn-primary"><i class="bi bi-eye"></i></a> --}}
                                    <a href="{{ route('sertifikasi.pdf', $data->data_id) }}"
                                        class="btn icon btn-primary {{ $data->status == 'diterima' ? '' : 'disabled' }}"><i
                                            class="bi bi-printer"></i></a>
                                    <a href="" class="btn icon btn-danger"
                                        onclick="deletePost('{{ $data->id }}')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('mazer') }}/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#btnDiterima, #btnTidakDiterima').on('click', function() {
                var id = $(this).data('id');
                var status = $(this).data('status');

                $(this).removeClass('btn-secondary').addClass('btn-primary');
                $(this).siblings().removeClass('btn-primary').addClass('btn-secondary');

                $.ajax({
                    url: '/admin/update_status_sertifikasi',
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PATCH",
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            })
        });
    </script>
@endsection
