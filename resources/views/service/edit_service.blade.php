<div class="modal  fade shadow animated--grow-in row" id="editServiceModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Layanan</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="updateServiceForm">
                    @csrf
                    <input type="hidden" name="id" id="edit-id" class="form-control " value="">
                    <label for="title">Nama Layanan :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" id="edit-name" class="form-control "
                            placeholder="Masukan nama layanan" value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-name-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Jenis Layanan :</label>
                        <select name="service_type" id="edit-service_type" class="form-control">
                            @foreach ($serviceType as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="service_type-error"></strong>
                        </span>
                    </div>
                    <label for="title">Keterangan :</label>
                    <div class="form-group has-feedback">
                        <textarea name="description" id="edit-description" class="form-control" rows="2"
                            value="{{ old('description') }}"></textarea>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-description-error"></strong>
                        </span>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="submitEditSeviceForm">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#submitEditSeviceForm', function() {
        var registerForm = $('#updateServiceForm');
        var id = parseInt($('#edit-id').val());
        var formData = registerForm.serialize();
        $('#edit-name-error').html("");
        $('#edit-description-error').html("");

        $.ajax({
            url: '/service/' + id,
            type: 'PUT',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#edit-name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.description) {
                        $('#edit-description-error').html(data.errors.description[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
