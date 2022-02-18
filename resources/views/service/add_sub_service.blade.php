<div class="modal  fade shadow animated--grow-in row" id="subServiceModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="subService">
                    @csrf
                    <input type="hidden" name="service_id" id="service-id" class="form-control " value="">
                    <div class="row">
                        <div class="col-lg-8">
                            <label for="title">Nama Sub Layanan :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="sub_service" class="form-control "
                                    placeholder="Masukan nama sub layanan" value="{{ old('sub_service') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="sub_service-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="title">Tarif :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="price" class="form-control " placeholder="Masukan tarif"
                                    value="{{ old('price') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="price-error"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Estimasi Waktu :</label>
                            <div class="form-group has-feedback">
                                <input type="number" name="estimated_time" class="form-control "
                                    placeholder="Masukan estimasi waktu" value="{{ old('estimated_time') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="estimated_time-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Satuan Waktu :</label>
                            <select name="time" class="form-control">
                                <option value="Hari">Hari</option>
                                <option value="Jam">Jam</option>
                                <option value="Menit">Menit</option>
                            </select>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger ">
                                <strong id="time-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="submitForm1" data-id=" ">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#submitForm1', function() {
        var registerForm = $('#subService');
        var formData = registerForm.serialize();
        $('#sub_service-error').html("");
        $('#service_id-error').html("");
        $('#price-error').html("");
        $('#estimated_time-error').html("");
        $('#time-error').html("");

        $.ajax({
            url: '/price',
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.sub_service) {
                        $('#sub_service-error').html(data.errors.sub_service[0]);
                    }
                    if (data.errors.price) {
                        $('#price-error').html(data.errors.price[0]);
                    }
                    if (data.errors.estimated_time) {
                        $('#estimated_time-error').html(data.errors.estimated_time[0]);
                    }
                    if (data.errors.time) {
                        $('#time-error').html(data.errors.time[0]);
                    }

                }
                if (data.success) {
                    window.location.href = "/service";
                }
            },
        });
    });
</script>
