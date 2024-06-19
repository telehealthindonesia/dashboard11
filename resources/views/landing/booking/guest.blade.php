<form action="" method="post">
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Nama Depan</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control form-control-sm" required name="nama_depan">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Nama Belakang</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" required name="nama_belakang">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <label>NIK</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" required name="nik">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Tempat Lahir</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" required name="tempat_lahir">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Tanggal Lahir</label>
        </div>
        <div class="col-md-8">
            <input type="date" class="form-control" required name="tanggal_lahir">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Nomor Passport</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" required name="passport">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Berlaku Sampai</label>
        </div>
        <div class="col-md-8">
            <input type="date" class="form-control" required name="exp_passport">
        </div>
    </div>
    <div class="row mb-1">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Status</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="checkbox">
                </td>
                <td>Vaksin Meningitis</td>
                <td>305.000</td>
                <td>Tersedia</td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox">
                </td>
                <td>Vaksin Influenza</td>
                <td>205.000</td>
                <td>Tersedia</td>
            </tr>
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary">Booking</button>
</form>
