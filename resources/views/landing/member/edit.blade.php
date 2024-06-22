<form>
    <table class="table">
        <tr>
            <td>Nama Depan</td>
            <td>:</td>
            <td><input type="text" class="form-control" value="{{ $user_edit->nama['nama_depan'] }}"></td>
        </tr>
        <tr>
            <td>Nama Belakang</td>
            <td>:</td>
            <td><input type="text" class="form-control" value="{{ $user_edit->nama['nama_belakang'] }}"></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="number" class="form-control" value="{{ $user_edit->nik }}"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td>
                <select class="form-control" name="gender">
                    <option value="male" @if($user_edit->gender == "male") {{ "selected" }}@endif>Laki-laki</option>
                    <option value="female" @if($user_edit->gender == "female") {{ "selected" }}@endif>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input type="text" class="form-control" value="{{ $user_edit->lahir['tempat'] }}"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="date" class="form-control" value="{{ $user_edit->lahir['tanggal'] }}"></td>
        </tr>
        <tr>
            <td>Passport</td>
            <td>:</td>
            <td><input type="text" class="form-control" value="{{ $user_edit->passport }}"></td>
        </tr>
        <tr>

            <td class="text-center" colspan="3">
                <a href="{{ route('member.profile') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>

    </table>
</form>
