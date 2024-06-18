<div class="row">
    <div class="col-md-12">
        <div class="tabs tabs-4" data-active="1">
            <header>
                <h4 @if($sub_class == "Profile") class="active" @endif><a href="{{ route('member.profile') }}">Profile</a></h4>
                <h4 @if($sub_class == "Transaksi") class="active" @endif><a href="{{ route('member.transaksi') }}">Riwayat Transaksi</a></h4>
                <h4 @if($sub_class == "File") class="active" @endif><a href="{{ route('member.file') }}">File</a></h4>
            </header>

        </div>
    </div>
</div>
