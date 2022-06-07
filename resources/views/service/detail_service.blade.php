<div class="card shadow mb-4">
    <div class="card-header d-sm-flex justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Layanan : {{ $detail->name }}</h6>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm body " id="btnSubService"
            data-bs-toggle="modal" data-bs-target="#subServiceModal" data-id="{{ $detail->id }}"><i
                class="bi bi-handbag-fill"></i>
            Tambah </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" width="30px">No</th>
                        <th scope="col">Sub Layanan</th>
                        <th scope="col">Estimasi Waktu</th>
                        <th scope="col">Tarif</th>
                        <th scope="col" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $price->price_name }}</td>
                            <td>{{ $price->estimated_time }}</td>
                            <td>{{ $price->price }}</td>
                            <td>
                                {{-- <button type="button" class="badge bg-warning btn-circle btn-sm border-0" id="#"
                                    data-bs-toggle="modal" data-bs-target="#editModal" data-id="#"><i
                                        class="bi bi-pencil-square"></i></button> --}}
                                <form action="/price/{{ $price->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger btn-circle btn-sm border-0"
                                        onclick="return confirm('Yakin Mau dihapus?')"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '#btnSubService', function() {
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/price/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#service-id').val(res[0].id);
            }
        });
    });
</script>
