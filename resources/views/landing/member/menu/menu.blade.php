<div class="row">
    <div class="col-md-12">
        <div class="tabs tabs-4" data-active="1">
            <header>
                <h4 @if($sub_class == "Profile") class="active" @endif><a href="{{ route('landing.member') }}">Profile</a></h4>
                <h4 @if($sub_class == "Anggota") class="active text-white" @endif><a href="{{ route('landing.member.anggota') }}">Anggota Keluarga</a></h4>
                <h4 @if($sub_class == "Transaksi") class="active" @endif><a href="{{ route('landing.member.transaksi') }}">Riwayat Transaksi</a></h4>
                <h4 @if($sub_class == "File") class="active" @endif><a href="{{ route('landing.member.file') }}">File</a></h4>

            </header>

        </div>
    </div>
</div>
