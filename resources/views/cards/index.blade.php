@extends('layouts.admin.main')
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
                    <tr>
                        <td class="text-bold-500">Michael Right</td>
                        <td>$15/hr</td>
                        <td class="text-bold-500">UI/UX</td>
                        <td>
                            <a href="#" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                            <a href="#" class="btn icon btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
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
            <form action="#">
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
                        <textarea name="content" id="" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">login</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection