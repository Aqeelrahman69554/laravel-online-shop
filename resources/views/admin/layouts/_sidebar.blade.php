<!-- Sidebar -->
<style>
    /* Mengubah warna latar belakang jika class-nya adalah .nav-item.active */
    .nav-item.active {
        background-color: #3e3e42 !important;
        /* Ganti dengan warna yang kamu suka */
        border-radius: 5px;
        /* Opsional: agar sudutnya tumpul */
    }

    /* Mengubah warna teks agar terlihat kontras */
    .nav-item.active a {
        color: #ffffff !important;
        font-weight: bold;
    }
</style>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
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
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('admin/pages/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-edit"></i>
                        <p>Content Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('admin/home*', 'admin/service*') ? 'show' : '' }}"
                        id="tables">
                        <ul class="nav nav-collapse">
                            <li class="nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Request::is('admin/service*') ? 'active' : '' }}">
                                <a href="{{ route('service') }}">
                                    <i class="nav-icon fas fa-headset"></i>
                                    <span>Service</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('admin/books') ? 'active' : '' }}">
                    <a href="{{ route('books') }}">
                        <i class="fas fa-book"></i>
                        <p>Books</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/categories') ? 'active' : '' }}">
                    <a href="{{ route('categories') }}">
                        <i class="fas fa-th-large"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">
                        <i class="fas fa-inbox"></i>
                        <p>Contact</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
                    <a href="{{ route('orders') }}">
                        <i class="fas fa-receipt"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/sitestatistic') ? 'active' : '' }}">
                    <a href="{{ route('sitestatistic') }}">
                        <i class="fas fa-chart-bar"></i>
                        <p>Site Statistic</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
