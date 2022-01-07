@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pelanggan</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan Hoki Laundry</h6>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="bi bi-person-plus-fill"></i>
                    Tambah </a>
                @include('customers.add_customer')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $customer->customer_code }} </td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <a href="" class="badge bg-primary"><i class="bi bi-eye"></i></a>
                                        <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                                        <a href="" class="badge bg-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
