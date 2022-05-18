<div class="modal  fade shadow animated--grow-in row" id="editOutputModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Output</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="updateOutputForm">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit-id" class="form-control " value="">
                    <div class="row">
                        <div class="col-lg-8">
                            <label for="title">Nama :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="name" id="edit-name" class="form-control "
                                    placeholder="Masukan nama output" value="{{ old('name') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="edit-name-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="title">Harga :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="price" id="edit-price" class="form-control "
                                    placeholder="Masukan harga" value="{{ old('price') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="edit-price-error"></strong>
                                </span>
                            </div>
                        </div>
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
                        <button type="button" class="btn btn-primary" id="submitUpadateForm">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#submitUpadateForm', function() {
        var registerForm = $('#updateOutputForm');
        var id = parseInt($('#edit-id').val());
        var formData = registerForm.serialize();
        $('#edit-name-error').html("");
        $('#edit-description-errorr').html("");
        $('#edit-price-error').html("");

        $.ajax({
            url: '/output/' + id,
            type: 'POST',
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
                    if (data.errors.price) {
                        $('#edit-price-error').html(data.errors.price[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
