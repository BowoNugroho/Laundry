<div class="modal  fade shadow animated--grow-in row" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="Customer">
                    @csrf
                    <label for="title">Nama Customer :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control " placeholder="Masukan nama"
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
                    <div class="form-group">
                        <label>Jenis Kelamin:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="gender-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="status-error"></strong>
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
{{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#submitForm', function() {
        var registerForm = $('#Customer');
        var formData = registerForm.serialize();
        $('#name-error').html("");
        $('#phone-error').html("");
        $('#address-error').html("");
        $('#gender-error').html("");
        $('#status-error').html("");

        $.ajax({
            url: '/customer',
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
                    if (data.errors.gender) {
                        $('#gender-error').html(data.errors.gender[0]);
                    }
                    if (data.errors.status) {
                        $('#status-error').html(data.errors.status[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script> --}}
