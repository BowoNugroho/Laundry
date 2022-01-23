@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pelanggan</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div id="updateSuccess" class="hidden">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <div id="messages_content"></div>
        </div>
        {{-- modal untuk menambahkan customer --}}
        @include('customers.add_customer')
        {{-- modal untuk edit customer --}}
        @include('customers.edit_customer')

        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Customer Hoki Laundry</h6>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="bi bi-person-plus-fill"></i>
                    Tambah </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" width="50px">No</th>
                                <th scope="col" width="100px">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col" width="100px">Jenis Kelamin</th>
                                <th scope="col" width="50px">Status</th>
                                <th scope="col" width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }} </th>
                                    <td>{{ $customer->customer_code }} </td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->gender->gender }}</td>
                                    <td>
                                        @if ($customer->status->id == '1')
                                            <i class="bi bi-person-check-fill" style="color: rgb(49, 216, 91)"></i>
                                        @else
                                            <i class="bi bi-person-x-fill" style="color: rgb(216, 49, 49)"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/customer/{{ $customer->id }}"
                                            class="badge bg-primary btn-circle btn-sm"><i class="bi bi-eye"></i></a>
                                        <button type="button" class="badge bg-warning btn-circle btn-sm border-0"
                                            id="btnEditForm" data-bs-toggle="modal" data-bs-target="#editModal"
                                            data-id="{{ $customer->id }}"><i class="bi bi-pencil-square"></i></button>
                                        <form action="/customer/{{ $customer->id }}" method="post" class="d-inline">
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
    {{-- jQuery untuk mengirimkan data ke modal (edit data dengan modal) --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $('body').on('click', '#btnEditForm', function() {
            let id = $(this).data('id');

            $.ajax({
                url: '/customer/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#edit-id').val(res[0].id);
                    $('#edit-code').val(res[0].customer_code);
                    $('#edit-name').val(res[0].customer_name);
                    $('#edit-phone').val(res[0].phone);
                    $('#edit-address').val(res[0].address);

                    if (res[0].gender_id == 1) {
                        $('#edit-gender1').prop('checked', true);
                    } else {
                        $('#edit-gender2').prop('checked', true);
                    }

                    $('#edit-status option').filter(function() {
                        return ($(this).val() == res[0].status_id);
                    }).prop('selected', true);

                }
            });
        });
    </script>

@endsection
