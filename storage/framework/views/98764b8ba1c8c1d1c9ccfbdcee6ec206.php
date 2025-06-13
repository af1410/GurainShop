<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?php echo e(asset('img/favicon.png')); ?>" alt="BerkahIbu" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Toko Berkah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item <?php if(request()->is('dashboard*')): ?> menu-open <?php endif; ?>">
                    <a href="/dashboard" class=" nav-link <?php if(request()->is('dashboard*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('penjualan*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('penjualan.index')); ?>" class=" nav-link <?php if(request()->is('penjualan*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fa fa-cube"></i>
                        <p>
                            Laporan Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->is('pembelian*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('pembelian.index')); ?>" class=" nav-link <?php if(request()->is('pembelian*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Laporan Pembelian
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH E:\Berkah Ibu App\laravel-11-multi-auth-main\laravel-11-multi-auth-main\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>