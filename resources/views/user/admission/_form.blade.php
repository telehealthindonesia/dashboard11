<div class="card">
    <div class="card-header">
        <h3 class="card-title">Buat Kunjungan Baru</h3>
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <label class="col-sm-3 col-form-label">Nama Faskes</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_faskes">
                    <option value="{{ $customer->_id }}">{{ $customer->name }}</option>
                </select>
                @error('id_faskes')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-1">
            <label class="col-sm-3 col-form-label">Nama Pasien</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_pasien">
                    <option value="{{ $user->_id }}">{{ $user->nama['nama_depan']." ".$user->nama['nama_belakang'] }}</option>
                </select>
                @error('id_pasien')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-1">
            <label class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="date" value="{{ old('date', date('Y-m-d')) }}">
                @error('date')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-1">
            <label class="col-sm-3 col-form-label">Pelayanan</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_service" required>
                    <option value="">---pilih---</option>
                    @foreach($service as $data)
                        <option value="{{ $data->_id }}">{{ $data->name }}</option>
                    @endforeach

                </select>
                @error('id_service')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

    </div>

</div>
