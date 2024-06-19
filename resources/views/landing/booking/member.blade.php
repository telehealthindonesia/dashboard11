<form action="" method="post">
    <div class="row mb-1">
        <div class="col-md-4">
            <label>Pasien</label>
        </div>
        <div class="col-md-8">
            <select class="form-control" name="user_id" required>
                <option value="{{ $user->id }}">{{ $user->nama['nama_depan'] }}</option>
                @foreach($family as $fam)
                    <option value="{{ $fam->id }}">{{ $fam->nama['nama_depan'] }}</option>
                @endforeach

            </select>
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
