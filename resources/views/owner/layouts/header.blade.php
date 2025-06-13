<style>
    .main-header {
        background-color: #ffffff;
        border-bottom: 1px solid #e4e4e4;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .nav-link {
        transition: all 0.2s ease-in-out;
        padding: 8px 15px;
        border-radius: 6px;
        color: #343a40 !important;
        font-weight: 500;
    }

    .nav-link:hover {
        background-color: #f0f0f0;
        color: #007bff !important;
    }

    .nav-item.active .nav-link {
        font-weight: bold;
        color: #007bff !important;
        background-color: #eaf1ff;
        border-radius: 6px;
    }

    .dropdown-menu {
        border-radius: 8px;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .text-danger:hover {
        background-color: #ffe5e5;
    }
</style>

<nav class="main-header navbar navbar-expand navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block @if(request()->routeIs('owner.dashboard*')) active @endif">
            <a href="{{ route('owner.dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block @if(request()->routeIs('owner.laporanbeli.*')) active @endif">
            <a href="{{ route('owner.laporanbeli.index') }}" class="nav-link">Laporan Pembelian</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block @if(request()->routeIs('owner.laporanjual.*')) active @endif">
            <a href="{{ route('owner.laporanjual.index') }}" class="nav-link">Laporan Penjualan</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block @if(request()->routeIs('owner.owner.*')) active @endif">
            <a href="{{ route('owner.owner.index') }}" class="nav-link">Daftar Owner</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle mr-2"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow">
                <a href="{{ route('owner.profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item text-danger"
                   onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin logout?')) { document.getElementById('logout-form').submit(); }">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
