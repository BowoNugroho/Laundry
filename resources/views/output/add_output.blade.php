<div class="modal  fade shadow animated--grow-in row" id="outputModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Output</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <form method="POST" id="Output">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <label for="title">Nama :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="name" class="form-control " placeholder="Masukan nama output"
                                    value="{{ old('name') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="title">Harga :</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="price" class="form-control " placeholder="Masukan harga"
                                    value="{{ old('price') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger ">
                                    <strong id="price-error"></strong>
                                </span>
                            </div>
                        </div>
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
        var registerForm = $('#Output');
        var formData = registerForm.serialize();
        $('#name-error').html("");
        $('#description-errorr').html("");
        $('#price-error').html("");

        $.ajax({
            url: '/output',
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.description) {
                        $('#description-error').html(data.errors.description[0]);
                    }
                    if (data.errors.price) {
                        $('#price-error').html(data.errors.price[0]);
                    }

                }
                if (data.success) {
                    location.reload();
                }
            },
        });
    });
</script>
