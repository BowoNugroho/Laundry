<div class="modal  fade shadow animated--grow-in row" id="editUserModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Pengguna</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="updateUserForm">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit-id" class="form-control " value="">
                    <label for="title">Nama User :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" id="edit-name" class="form-control "
                            placeholder="Masukan nama User" value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-name-error"></strong>
                        </span>
                    </div>
                    <label for="title">Username :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="username" id="edit-username" class="form-control "
                            placeholder="Masukan nama username" value="{{ old('username') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-username-error"></strong>
                        </span>
                    </div>
                    <label for="title">Email :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="email" id="edit-email" class="form-control "
                            placeholder="Masukan email" value="{{ old('email') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-email-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Level :</label>
                        <div class="form-check form-check-inline">
                            @foreach ($levels as $level)
                                <input class="form-check-input" type="radio" name="level"
                                    id="edit-level{{ $level->id }}" id="inlineRadio{{ $level->id }}"
                                    value="{{ $level->id }}">
                                <label class="form-check-label"
                                    for="inlineRadio{{ $level->id }}">{{ $level->name }}</label>
                            @endforeach
                        </div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-level-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Cabang :</label>
                        <select name="branch" id="edit-branch" class="form-control">
                            @foreach ($cabangs as $cabang)
                                <option value="{{ $cabang->id }}">{{ $cabang->name }}</option>
                            @endforeach
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="edit-branch-error"></strong>
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
        var registerForm = $('#updateUserForm');
        var id = parseInt($('#edit-id').val());
        var formData = registerForm.serialize();
        $('#edit-name-error').html("");
        $('#edit-username-errorr').html("");
        $('#edit-email-error').html("");
        $('#edit-level-error').html("");
        $('#edit-branch-error').html("");

        $.ajax({
            url: '/user/' + id,
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#edit-name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.username) {
                        $('#edit-username-error').html(data.errors.username[0]);
                    }
                    if (data.errors.email) {
                        $('#edit-email-error').html(data.errors.email[0]);
                    }
                    if (data.errors.level) {
                        $('#edit-level-error').html(data.errors.level[0]);
                    }
                    if (data.errors.branch) {
                        $('#edit-branch-error').html(data.errors.branch[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
