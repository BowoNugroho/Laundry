<div class="modal  fade shadow animated--grow-in row" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="User">
                    @csrf
                    <label for="title">Nama User :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control " placeholder="Masukan nama User"
                            value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="name-error"></strong>
                        </span>
                    </div>
                    <label for="title">Username :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control " placeholder="Masukan nama username"
                            value="{{ old('username') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="username-error"></strong>
                        </span>
                    </div>
                    <label for="title">Email :</label>
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control " placeholder="Masukan email"
                            value="{{ old('email') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="email-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Level :</label>
                        <div class="form-check form-check-inline">
                            @foreach ($levels as $level)
                                <input class="form-check-input" type="radio" name="level"
                                    id="inlineRadio{{ $level->id }}" value="{{ $level->id }}">
                                <label class="form-check-label" for="inlineRadio1">{{ $level->name }}</label>
                            @endforeach
                        </div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="level-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Cabang :</label>
                        <select name="branch" class="form-control">
                            @foreach ($cabangs as $cabang)
                                <option value="{{ $cabang->id }}">{{ $cabang->branch_name }}</option>
                            @endforeach
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="branch-error"></strong>
                        </span>
                    </div>
                    <label for="title">Password :</label>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control "
                            placeholder="Masukan default password" value="{{ old('password') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger ">
                            <strong id="password-error"></strong>
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
        var registerForm = $('#User');
        var formData = registerForm.serialize();
        $('#name-error').html("");
        $('#username-errorr').html("");
        $('#email-error').html("");
        $('#cabang-error').html("");
        $('#password-error').html("");

        $.ajax({
            url: '/user',
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.username) {
                        $('#username-error').html(data.errors.username[0]);
                    }
                    if (data.errors.email) {
                        $('#email-error').html(data.errors.email[0]);
                    }
                    if (data.errors.cabang) {
                        $('#cabang-error').html(data.errors.cabang[0]);
                    }
                    if (data.errors.password) {
                        $('#password-error').html(data.errors.password[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
