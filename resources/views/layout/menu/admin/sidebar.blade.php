@php
use Illuminate\Support\Facades\Auth;
$foto = \Illuminate\Support\Facades\Auth::user()['foto']
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if($foto == null)
                        <?php
                        $url = "https://file.atm-sehat.com/storage/image/ZQC6SOX05hA0enLhvPWrEfVxMv9zzm9Sc7qp2EQO.jpg";
                        ?>
                @else
                        <?php
                        $url = $foto['url'];
                        ?>
                @endif
                <img src="{{ $url }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()['nama']['nama_depan'] }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">

                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>My Profile<span class="right badge badge-danger">New</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('marital_status') }}" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Master
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('observation.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Observation
                        </p>
                    </a>
                </li>
                <li class="nav-header">EXAMPLES</li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

