@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Layanan</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>
        <div class="row">

            @include('service.add_service')
            @include('service.edit_service')
            @include('service.add_sub_service')

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Layanan Hoki Laundry</h6>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body " href="#"
                            data-bs-toggle="modal" data-bs-target="#serviceModal"><i class="bi bi-handbag-fill"></i>
                            Tambah </a>
                        {{-- {{ route('coba.index') }} --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" width="30px">No</th>
                                        <th scope="col">Layanan</th>
                                        <th scope="col">Jenis Layanan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $service->service_name }}</td>
                                            <td>

                                                @if ($service->serviceType->service_type_name == 'Kiloan')
                                                    <div class="badge bg-success">
                                                        {{ $service->serviceType->service_type_name }}</div>
                                                @else
                                                    <div class="badge bg-info">
                                                        {{ $service->serviceType->service_type_name }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $service->service_description }}</td>
                                            <td>
                                                <a href="/service/{{ $service->id }}"
                                                    class="badge bg-primary btn-circle btn-sm spa_route"><i
                                                        class="bi bi-eye"></i></a>
                                                <button type="button" class="badge bg-warning btn-circle btn-sm border-0"
                                                    id="btnEditServiceForm" data-bs-toggle="modal"
                                                    data-bs-target="#editServiceModal" data-id="{{ $service->id }}"><i
                                                        class="bi bi-pencil-square"></i></button>
                                                <form action="/service/{{ $service->id }}" method="post"
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
            @include('service.default')
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            const link = $('.spa_route'),
                render = $('#render');

            link.on('click', function(t) {
                t.preventDefault()
                let route = $(this).attr('href');



                $.get(route, function(data) {
                    // console.log(data);
                    render.html(data)
                });
            })
        })
        $('body').on('click', '#btnEditServiceForm', function() {
            let id = $(this).data('id');

            $.ajax({
                url: '/service/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#edit-id').val(res[0].id);
                    $('#edit-name').val(res[0].service_name);
                    $('#edit-description').val(res[0].service_description);

                    $('#edit-service_type option').filter(function() {
                        return ($(this).val() == res[0].service_type_id);
                    }).prop('selected', true);

                }
            });
        });
    </script>
@endsection
