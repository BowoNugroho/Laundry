@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Transaksi </h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>
        {{-- @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
        {{-- <div id="updateSuccess" class="hidden">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div id="messages_content"></div>
        </div> --}}
        {{-- modal untuk menambahkan customer --}}
        {{-- @include('customers.add_customer') --}}
        {{-- modal untuk edit customer --}}
        {{-- @include('customers.edit_customer') --}}
        <div class="row">
            <div class="col-sm-4 ">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">Pilih Customer</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="subService">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="title">Pilih Nama:</label>
                                    <div class="form-group has-feedback">
                                        <select class="form-select" aria-label="Default select example" name="customer"
                                            id="customer">
                                            <option value="">Pilih disini.. </option>
                                            @foreach ($customers as $c)
                                                <option value="{{ $c->id }}">{{ $c->customer_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="title">Tgl Masuk :</label>
                                    <div class="form-group has-feedback">
                                        <input type="date" name="date_in" class="form-control "
                                            placeholder="Masukan tgl masuk" value="">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        <span class="text-danger ">
                                            <strong id="price-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Nama Customer :</label>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="customer_name" id="customer_name" class="form-control"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Tgl Keluar :</label>
                                    <input type="date" name="date_out" class="form-control "
                                        placeholder="Masukan tgl keluar" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>No Hp :</label>
                                    <div class="form-group has-feedback">
                                        <input type="number" name="phone" id="phone" class="form-control " placeholder=""
                                            value="" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Status Bayar :</label>
                                    <div class="form-check-inline">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="inlineRadio1" value="Belum Bayar">
                                            <label class="form-check-label" for="inlineRadio1">
                                                Belum Bayar
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="inlineRadio2" value="Lunas">
                                            <label class="form-check-label" for="inlineRadio2">
                                                Lunas
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="title">Alamat :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="address" id="address" class="form-control " placeholder=""
                                    value="" readonly>
                            </div>
                            <label for="title">Keterangan :</label>
                            <div class="form-group has-feedback">
                                <textarea name="description" class="form-control" rows="3" value=""></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">Pilih Layanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="title">Pilih Layanan:</label>
                                <div class="form-group has-feedback">
                                    <select class="form-select" aria-label="Default select example" name="service"
                                        id="service">
                                        <option value="">Pilih disini.. </option>
                                        @foreach ($services as $s)
                                            <option value="{{ $s->id }}">{{ $s->service_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Jenis Layanan :</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="a" id="a" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="title">Pilih Sub Layanan:</label>
                                <div class="form-group has-feedback">
                                    <select class="form-select" aria-label="Default select example" name="sub_layanan"
                                        id="sub_layanan">
                                        <option value="">Pilih disini.. </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Estimasi Waktu :</label>
                                <input type="text" name="estimated_time" id="estimated_time" class="form-control "
                                    readonly>
                            </div>
                            <div class="col-sm-4">
                                <label>Tarif :</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="tarif" id="tarif" onchange="x();" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Jumlah Kg/Pcs :</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="jumlah1" id="jumlah1" onchange="x();" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Jumlah Tarif :</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="jumlah2" id="jumlah2" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex  justify-content-md-end">
                            <button type="button" class="btn btn-primary" id="submitForm1" data-id=" ">Tambah</button>
                        </div>
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50px">No</th>
                                        <th scope="col">Layanan</th>
                                        <th scope="col">Jenis Layanan</th>
                                        <th scope="col">Sub Layanan</th>
                                        <th scope="col">Estimasi</th>
                                        <th scope="col">Jumlah Kg/pcs</th>
                                        <th scope="col">Tarif</th>
                                        <th scope="col">Jumlah Tarif</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"> </th>
                                        <td> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <form action="" method="post" class="d-inline">
                                                <button class="badge bg-danger btn-circle btn-sm border-0"
                                                    onclick="return confirm('Yakin Mau dihapus?')"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-grid gap-2 d-md-flex  justify-content-md-end">
                            <button type="button" class="btn btn-success" id="submitForm1" data-id=" ">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#customer").change(function() {
                var id = $(this).val()

                $.ajax({
                    type: "GET",
                    url: "/get-data-customer/" + id,
                    dataType: "json",
                    success: function(res) {
                        console.log(res);
                        $("#customer_name").val(res[0].customer_name)
                        $("#phone").val(res[0].customer_phone)
                        $("#address").val(res[0].customer_address)
                    }
                })
            })
        })
        $(document).ready(function() {
            $("#service").on('change', function() {
                var id = $(this).val()

                $.ajax({
                    type: "GET",
                    url: "/get-data-service/" + id,
                    dataType: "json",
                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $("#a").val(res[0][0].service_type_name)
                        }
                        if (res) {
                            $('#sub_layanan').empty();
                            $('#sub_layanan').append('<option hidden>Pilih disini..</option>');
                            $.each(res[0], function(key, sub_layanan) {
                                $('select[name="sub_layanan"]').append(
                                    '<option value="' +
                                    sub_layanan.id + '">' + sub_layanan
                                    .price_name +
                                    '</option>');
                            });
                        } else {
                            $('#sub_layanan').empty();
                        }
                    }
                })
            })
        })
        $(document).ready(function() {
            $("#sub_layanan").change(function() {
                var id = $(this).val()
                console.log(id);

                $.ajax({
                    type: "GET",
                    url: "/get-data-price/" + id,
                    dataType: "json",
                    success: function(res) {
                        console.log(res);
                        $("#tarif").val(res[0].price)
                        $("#estimated_time").val(res[0].estimated_time)
                    }
                })
            })
        })

        function x() {
            var tarif = document.getElementById('tarif').value;
            var jumlah1 = document.getElementById('jumlah1').value;
            var result = parseInt(tarif) * parseInt(jumlah1);
            if (!isNaN(result)) {
                document.getElementById('jumlah2').value = result;
            }
        }
    </script>
@endsection
