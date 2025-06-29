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
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item <?php if(request()->is('dashboard*')): ?> menu-open <?php endif; ?>">
                    <a href="/dashboard" class="nav-link <?php if(request()->is('dashboard*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('penjualan*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('penjualan.index')); ?>" class="nav-link <?php if(request()->is('penjualan*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Transaksi Penjualan</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('pembelian*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('pembelian.index')); ?>" class="nav-link <?php if(request()->is('pembelian*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>Transaksi Pembelian</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('laporanbeli*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('laporanbeli.index')); ?>" class="nav-link <?php if(request()->is('laporanbeli*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-poll-h"></i>
                        <p>Laporan Pembelian</p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('laporanjual*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('laporanjual.index')); ?>" class="nav-link <?php if(request()->is('laporanjual*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Style disamakan dengan sidebar admin -->
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
        color: #ffffff !important; /* teks putih saat aktif */
        background-color: #007bff;  /* background biru */
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
<?php /**PATH D:\gurainshop\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>