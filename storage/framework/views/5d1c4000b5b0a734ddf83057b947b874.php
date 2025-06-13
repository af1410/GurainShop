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
                <li class="nav-item <?php if(request()->routeIs('admin.dashboard')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php if(request()->routeIs('admin.dashboard')): ?> active text-light <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.barang.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.barang.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.barang.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fa fa-cube"></i>
                        <p>
                            Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.pelanggan.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.pelanggan.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.pelanggan.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.suplier.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.suplier.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.suplier.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Suplier
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.user.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.user.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Kasir
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.admin.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.admin.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.admin.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('admin.penjualan.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.penjualan.index')); ?>" class="nav-link <?php if(request()->is('admin.penjualan.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Transaksi Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('admin.pembelian.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.pembelian.index')); ?>" class="nav-link <?php if(request()->is('admin.pembelian.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Transaksi Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.laporanbeli.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.laporanbeli.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.laporanbeli.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-poll-h"></i>
                        <p>
                            Laporan Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('admin.laporanjual.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('admin.laporanjual.index')); ?>" class="nav-link <?php if(request()->routeIs('admin.laporanjual.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Laporan Penjualan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

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
        color: #ffffff !important; /* teks jadi putih saat aktif */
        background-color: #007bff; /* background biru */
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
<?php /**PATH D:\gurainshop\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>