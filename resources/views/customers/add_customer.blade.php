<div class="modal  fade shadow animated--grow-in row" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <div class="col-md-offset-1 ">
                    <form class="" method="POST" id="memberForm">
                        @csrf
                        <label for="title">Kode Customer</label>
                        <div class="form-group has-feedback">
                            <input type="text" name="name" class="form-control " placeholder="" value="">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" name="email" class="form-control " placeholder="" value="">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="number" name="phone" class="form-control " placeholder="Nomor Hp" value="">
                        </div>
                        <hr>
                        <label for="title">Alamat</label>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <input type="text" name="village" class="form-control" placeholder="Desa / Kelurahan"
                                    value="">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="subdistrict" class="form-control " placeholder="Kecamatan"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <input type="text" name="city" class="form-control" placeholder="Kota / Kabupaten "
                                    value="">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="province" class="form-control " placeholder="Provinsi"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <input type="text" name="code" class="form-control " placeholder="Kode Pos" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="detail" class="form-control"
                                placeholder="Detail Alamat ( Nama Jalan,Gedung,No Rumah,Blok/Unit no, Patokan )"
                                value="">
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
</div>
