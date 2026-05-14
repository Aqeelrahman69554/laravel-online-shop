<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('admin2/assets/img/kaiadmin/logoaqeel.png') }}" alt="navbar brand" class="navbar-brand"
                    style="height: 50px !important; width: auto; object-fit: contain;" />
                <span class="text-white fw-bold ms-2" style="font-size: 1.2rem;">TOBUKEL</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li
                    class="nav-item {{ Request::is('admin/home*', 'admin/service*', 'admin/service2*', 'admin/testimoni*', 'admin/about*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-edit"></i>
                        <p>Content Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('admin/home*', 'admin/service*', 'admin/service2*', 'admin/testimoni*', 'admin/about*') ? 'show' : '' }}"
                        id="tables">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('admin/home*') ? 'active' : '' }}">
                                <a href="{{ route('admin.home.index') }}">
                                    <span class="sub-item">Home</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/service') ? 'active' : '' }}">
                                <a href="{{ route('admin.service') }}">
                                    <span class="sub-item">Service</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/service2*') ? 'active' : '' }}">
                                <a href="{{ route('admin.service2') }}">
                                    <span class="sub-item">Service 2</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/testimoni*') ? 'active' : '' }}">
                                <a href="{{ route('admin.testimoni') }}">
                                    <span class="sub-item">Testimoni</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/about*') ? 'active' : '' }}">
                                <a href="{{ route('admin.about') }}">
                                    <span class="sub-item">About</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('admin/books*') ? 'active' : '' }}">
                    <a href="{{ route('admin.books') }}">
                        <i class="fas fa-book"></i>
                        <p>Books</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories') }}">
                        <i class="fas fa-th-large"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('admin/contact*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact') }}">
                        <i class="fas fa-envelope"></i>
                        <p>Contact</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.orders') }}">
                        <i class="fas fa-receipt"></i>
                        <p>Orders</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.banner*') ? 'active' : '' }}">
                    <a href="{{ route('admin.banner') }}">
                        <i class="fas fa-images"></i>
                        <p>Banner</p>
                    </a>
                </li>



            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
