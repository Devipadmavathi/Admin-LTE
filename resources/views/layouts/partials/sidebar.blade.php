<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
             alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch -->
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- Dashboard with submenus -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/index.html') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/index2.html') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/index3.html') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Your Custom Links -->
                <li class="nav-item">
                    <a href="{{ route('notes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>Notes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Roles</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Permissions</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <!-- Example Default AdminLTE Items -->
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="{{ url('pages/widgets.html') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Widgets</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('pages/charts/chartjs.html') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Charts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('pages/tables/data.html') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Tables</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('pages/calendar.html') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('pages/mailbox.html') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Mailbox</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
