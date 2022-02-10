@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Layanan</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Layanan Hoki Laundry</h6>
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body spa_route"
                            href="{{ route('coba.index') }}"><i class="bi bi-person-plus-fill"></i>
                            Tambah </a>
                    </div>
                    <div class="card-body">

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
    </script>

@endsection
