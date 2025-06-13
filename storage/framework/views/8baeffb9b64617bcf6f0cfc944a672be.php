<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?php echo e(asset('img/GurainShop.png')); ?>" alt="GurainShop" class="brand-image img-circle elevation-3" style="opacity: .8; width: 60px; height: 80px;">
        <span class="brand-text font-weight text-dark">Gurain Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item <?php if(request()->routeIs('owner.dashboard*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.dashboard')); ?>" class=" nav-link <?php if(request()->routeIs('owner.dashboard*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('owner.laporanbeli.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.laporanbeli.index')); ?>" class="nav-link <?php if(request()->routeIs('owner.laporanbeli.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-poll-h"></i>
                        <p>Laporan Pembelian</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('owner.laporanjual.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.laporanjual.index')); ?>" class="nav-link <?php if(request()->routeIs('owner.laporanjual.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('owner.owner*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.owner.index')); ?>" class="nav-link <?php if(request()->routeIs('owner.owner*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Daftar Owner</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Tambahkan STYLE agar tampilannya seperti sidebar admin -->
<style>
    .nav-link {
        color: #495057 !important;
        padding: 10px 15px;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .nav-link:hover {
        background-color: #f0f0f0;
        color: #007bff !important;
    }

    .nav-link.active {
        font-weight: bold;
        color: #ffffff !important;
        background-color: #007bff;
        border-radius: 6px;
    }

    .nav-pills .nav-item {
        margin-bottom: 5px;
    }

    .sidebar {
        background-color: #f8f9fa;
    }

    .sidebar-primary {
        border-right: 1px solid #e4e4e4;
    }
</style>
<?php /**PATH D:\gurainshop\resources\views/owner/layouts/sidebar.blade.php ENDPATH**/ ?>