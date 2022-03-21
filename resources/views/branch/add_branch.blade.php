<div class="modal  fade shadow animated--grow-in row" id="branchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Cabang</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="Branch">
                    @csrf
                    <label for="title">Nama Cabang :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control " placeholder="Masukan nama Cabang"
                            value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="name-error"></strong>
                        </span>
                    </div>
                    <label for="title">No Hp :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="phone" class="form-control " placeholder="Masukan nomor hp"
                            value="{{ old('phone') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="phone-error"></strong>
                        </span>
                    </div>
                    <label for="title">Alamat :</label>
                    <div class="form-group has-feedback">
                        <textarea name="address" class="form-control" rows="3" value="{{ old('address') }}"></textarea>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="address-error"></strong>
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
        var registerForm = $('#Branch');
        var formData = registerForm.serialize();
        $('#name-error').html("");
        $('#phone-errorr').html("");
        $('#address-error').html("");

        $.ajax({
            url: '/branch',
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.phone) {
                        $('#phone-error').html(data.errors.phone[0]);
                    }
                    if (data.errors.address) {
                        $('#address-error').html(data.errors.address[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
