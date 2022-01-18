@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pelanggan</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p>
            <!-- DataTales Example -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Detail Member</h6>
                        @if ($details->status->id == '1')
                            <i class="bi bi-person-check-fill" style="color: rgb(49, 216, 91)"></i>
                        @else
                            <i class="bi bi-person-x-fill" style="color: rgb(216, 49, 49)"></i>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Kode Customer</td>
                                    <td>{{ $details->customer_code }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $details->customer_name }}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>{{ $details->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $details->address }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $details->gender->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $details->status->status }}</td>
                                </tr>
                            </thead>
                        </table>
                        <a href="/customer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body"><i
                                class="bi bi-arrow-left"></i>
                            Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
