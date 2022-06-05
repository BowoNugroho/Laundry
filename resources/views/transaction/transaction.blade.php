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
        @foreach ($f as $w)
            {{ $w }}
        @endforeach
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
                                            <option value="{{ $s->id }}">{{ $s->name }} </option>
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
                                        @foreach ($types as $t)
                                            <option value="{{ $t->id }}">{{ $t->customer_name }} </option>
                                            @endforeach @foreach ($types as $t)
                                                <option value="{{ $t->id }}">{{ $t->customer_name }} </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Tarif :</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Estimasi Waktu :</label>
                                <input type="text" name="date_out" class="form-control " placeholder="" value="" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Satuan Waktu</label>
                                <input type="text" name="date_out" class="form-control " placeholder="" value="" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label>Jumlah Kg/Pcs :</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="customer_name" id="customer_name" class="form-control">
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
                                        <th scope="col">Jumlah</th>
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
                        $("#phone").val(res[0].phone)
                        $("#address").val(res[0].address)
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
                            $("#a").val(res[0][0].name)
                        }
                        if (res) {
                            $('#sub_layanan').empty();
                            $('#sub_layanan').append('<option hidden>Choose Course</option>');
                            $.each(data, function(key, sub_layanan) {
                                $('select[name="sub_layanan"]').append(
                                    '<option value="' +
                                    key + '">' + sub_layanan.name + '</option>');
                            });
                        }
                    }
                })
            })
        })
    </script>
    {{-- jQuery untuk mengirimkan data ke modal (edit data dengan modal) --}}
    {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    </script> --}}
@endsection
