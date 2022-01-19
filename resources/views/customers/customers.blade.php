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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Customer Hoki Laundry</h6>
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
                                        <a href="/customer/{{ $customer->customer_name }}"
                                            class="badge bg-primary btn-circle btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="" class="badge bg-warning btn-circle btn-sm"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form action="/customer/{{ $customer->customer_name }}" method="post"
                                            class="d-inline">
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
@endsection
