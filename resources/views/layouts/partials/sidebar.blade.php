<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ Storage::url($setting->path_image ?? '') }}" alt="Logo"
            class="brand-image img-circle elevation-3 bg-light" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $setting->company_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Storage::url(auth()->user()->path_image) }}" alt="" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('profile.show') }}" class="d-block" data-toggle="tooltip" data-placement="top"
                    title="Edit Profil">
                    {{ auth()->user()->name }}
                    <i class="fas fa-pencil-alt ml-2 text-sm text-primary"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('monitoring.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Monitoring
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjadwalan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Penjadwalan Pakan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jenisikan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-fish"></i>
                        <p>
                            Jenis Ikan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Data Sensor
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jarak.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor Jarak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sensorair.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sensor PH Air</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">REPORT</li>
                <li class="nav-item">
                    <a href="{{ route('report.index') }}"
                        class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>
                            Data Pemberian Pakan
                        </p>
                    </a>
                </li>

                <li class="nav-header">PENGATURAN APLIKASI</li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                        class="nav-link {{ request()->is('setting*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
