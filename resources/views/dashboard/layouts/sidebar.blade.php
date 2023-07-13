<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ url("/assets/images/logos/dark-logo.svg") }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard" aria-expanded="false"
                        {{ Request::is('dashboard') ? 'active' : '' }}>
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @role('administrator')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">ADMINISTRATOR</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('setup-audit.index') }}" aria-expanded="false"
                        {{ Request::is('setup-audit') ? 'active' : '' }}>
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Setup Audit</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.user.add') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Add User</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">KETUA AUDITOR</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('input-auditor.index') }}" aria-expanded="false"
                        {{ Request::is('/input-auditor') ? 'active' : '' }}>
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Input Auditor</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUDITOR</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('auditor.index') }}" aria-expanded="false">
                        <a class="sidebar-link" href="{{ route('setup-file.index') }}" aria-expanded="false"
                            {{ Request::is('setup-file') ? 'active' : '' }}>
                            <span>
                                <i class="ti ti-folder-plus"></i>
                            </span>
                            <span class="hide-menu">Setup File</span>
                        </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUDITEE</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('auditee.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Setup Auditee</span>
                    </a>
                </li>
                @endrole

                @role('ketua_auditor')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">KETUA AUDITOR</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('input-auditor.index') }}" aria-expanded="false"
                        {{ Request::is('/input-auditor') ? 'active' : '' }}>
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Input Auditor</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUDITOR</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('auditor.index') }}" aria-expanded="false">
                        <a class="sidebar-link" href="{{ route('setup-file.index') }}" aria-expanded="false"
                            {{ Request::is('setup-file') ? 'active' : '' }}>
                            <span>
                                <i class="ti ti-folder-plus"></i>
                            </span>
                            <span class="hide-menu">Setup File</span>
                        </a>
                </li>
                @endrole

                @role('auditor')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUDITOR</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('auditor.index') }}" aria-expanded="false">
                        <a class="sidebar-link" href="{{ route('setup-file.index') }}" aria-expanded="false"
                            {{ Request::is('setup-file') ? 'active' : '' }}>
                            <span>
                                <i class="ti ti-folder-plus"></i>
                            </span>
                            <span class="hide-menu">Setup File</span>
                        </a>
                </li>
                @endrole

                @role('auditee')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUDITEE</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('auditee.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Setup Auditee</span>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->