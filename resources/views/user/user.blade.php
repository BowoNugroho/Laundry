@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>
        <div id="updateSuccess" class="hidden">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div id="messages_content"></div>
        </div>
        @include('user.add_user')
        @include('user.edit_user')

        <div class="col-xl-6 col-md-6 mb-4 " style="margin-left:auto;margin-right:auto">
            <div class="card shadow mb-4">
                <div class="card-header d-sm-flex justify-content-between py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User Hoki Laundry</h6>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body" data-bs-toggle="modal"
                        data-bs-target="#userModal"><i class="bi bi-person-plus-fill"></i>
                        Tambah </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col" width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->level->name }}</td>
                                        <td>{{ $user->branch->branch_name }}</td>
                                        <td>
                                            <button type="button" class="badge bg-warning btn-circle btn-sm border-0"
                                                id="btnEditForm" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                data-id="{{ $user->id }}" data-level_id="{{ $user->level_id }}"
                                                data-password="{{ $user->password }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger btn-circle btn-sm border-0"
                                                    onclick="return confirm('Yakin Mau dihapus?')"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $('body').on('click', '#btnEditForm', function() {
            let id = $(this).data('id');
            let level_id = $(this).data('level_id');
            let password = $(this).data('password');
            console.log(id);
            $.ajax({
                url: '/user/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#edit-id').val(res[0].id);
                    $('#edit-name').val(res[0].name);
                    $('#edit-username').val(res[0].username);
                    $('#edit-email').val(res[0].email);

                    $('#edit-level' + level_id).filter(function() {
                        return ($(this).val() == res[0].level_id);
                    }).prop('checked', true);

                    $('#edit-branch option').filter(function() {
                        return ($(this).val() == res[0].branch_id);
                    }).prop('selected', true);

                }
            });
        });
    </script>
@endsection
