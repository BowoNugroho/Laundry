<div class="modal  fade shadow animated--grow-in row" id="serviceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="Service">
                    @csrf
                    <label for="title">Nama Layanan :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control " placeholder="Masukan nama layanan"
                            value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="name-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Jenis Layanan :</label>
                        <select name="service_type" class="form-control">
                            @foreach ($serviceType as $s)
                                <option value="{{ $s->id }}">{{ $s->service_type_name }}</option>
                            @endforeach
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="service_type-error"></strong>
                        </span>
                    </div>
                    <label for="title">Keterangan :</label>
                    <div class="form-group has-feedback">
                        <textarea name="description" class="form-control" rows="2" value="{{ old('description') }}"></textarea>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="description-error"></strong>
                        </span>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="submitForm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#submitForm', function() {
        var registerForm = $('#Service');
        var formData = registerForm.serialize();
        $('#name-error').html("");
        $('#service_type-error').html("");
        $('#description-error').html("");

        $.ajax({
            url: '/service',
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.service_type) {
                        $('#service_type-error').html(data.errors.service_type[0]);
                    }
                    if (data.errors.description) {
                        $('#description-error').html(data.errors.description[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
