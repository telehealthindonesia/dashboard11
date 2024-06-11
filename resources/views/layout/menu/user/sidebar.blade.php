<?php
use Illuminate\Support\Facades\Auth;
$foto = \Illuminate\Support\Facades\Auth::user()['foto']
?>
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
                @if(Auth::user()['is_super_admin']==true && Auth::user()['organisasi'] != null)
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">

                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>Pasien</p>
                        </a>
                    </li>
                @elseif(Auth::user()['level']=='petugas' && Auth::user()['organisasi'] != null)
                    <li class="nav-item">
                        <a href="{{ route('dashboard.customer') }}" class="nav-link">

                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link">

                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>Pasien</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">

                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>My Profile</p>
                    </a>
                </li>

                @if(Auth::user()['tbc']==true | Auth::user()['counselor']==true )
                    <li class="nav-item">
                        <a href="{{ route('message.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>
                                Messages
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('questionnaire.publish') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Kuesioner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('medication.mine') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Medication</p>
                        </a>
                    </li>


                @endif
                @if(Auth::user()->organisasi != null)
                @php

                    $id_organisasi = \Illuminate\Support\Facades\Auth::user()->organisasi['id'];
                    $organisasi = \App\Models\Customer::find($id_organisasi);
                @endphp

                @if($organisasi->is_distributor == true | \Illuminate\Support\Facades\Auth::user()->is_super_admin == true)
                    <li class="nav-header">Distributor</li>
                    <li class="nav-item">
                        <a href="{{ route('customers') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Customers</p>
                        </a>
                    </li>
                @endif
                @endif
                @if(Auth::user()['organisasi'] != null)
                    <li class="nav-header">Petugas</li>
                    <li class="nav-item">
                        <a href="{{ route('admission.index', ['id'=>Auth::user()['organisasi']['id']]) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admisi</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('service.faskes', ['id'=>Auth::user()['organisasi']['id']]) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pelayanan RS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.petugas.faskes', ['id'=>Auth::user()->organisasi['id']]) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Petugas</p>
                        </a>
                    </li>
                @endif

                @if(Auth::user()['is_super_admin']==true)
                    <li class="nav-header">Super Admin</li>
                    <li class="nav-item">
                        <a href="{{ route('service.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pelayanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('consultant.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Consultant</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.petugas.all') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Petugas All</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('observation.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Observation</p>
                        </a>
                    </li>
                @endif

                @if(Auth::user()['counselor']==true)
                    <li class="nav-item">
                        <a href="{{ route('questionnaire.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Master Kuesioner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('zoom.master.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Zoom Master</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('counselor.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Counselor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pasien.tbc.mine') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>My Patient</p>
                        </a>
                    </li>
                    <li class="nav-header">Medication</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Medication
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('drugs.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Obat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jenis Obat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sediaan Obat</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

