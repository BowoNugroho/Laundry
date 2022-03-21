<div class="modal  fade shadow animated--grow-in row" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Cabang</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="updateForm">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit-id" class="form-control " value="">
                    <label for="title">Nama Cabang :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" id="edit-name" class="form-control "
                            placeholder="Masukan nama Cabang" value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-name-error"></strong>
                        </span>
                    </div>
                    <label for="title">No Hp :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="phone" id="edit-phone" class="form-control "
                            placeholder="Masukan nomor hp" value="{{ old('phone') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-phone-error"></strong>
                        </span>
                    </div>
                    <label for="title">Alamat :</label>
                    <div class="form-group has-feedback">
                        <textarea name="address" id="edit-address" class="form-control" rows="3" value="{{ old('address') }}"></textarea>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-address-error"></strong>
                        </span>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="submitUpdateForm">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#submitUpdateForm', function() {
        var registerForm = $('#updateForm');
        var id = parseInt($('#edit-id').val());
        var formData = registerForm.serialize();
        $('#edit-name-error').html("");
        $('#edit-phone-error').html("");
        $('#edit-address-error').html("");

        $.ajax({
            url: '/branch/' + id,
            type: 'PUT',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#edit-name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.phone) {
                        $('#edit-phone-error').html(data.errors.phone[0]);
                    }
                    if (data.errors.address) {
                        $('#edit-address-error').html(data.errors.address[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
