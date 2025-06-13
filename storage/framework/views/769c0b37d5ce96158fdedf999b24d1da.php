<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?php echo e(asset('img/favicon.png')); ?>" alt="BerkahIbu" class="brand-image img-circle elevation-3" style="opacity: .8; width: 60px; height: 80px;">
        <span class="brand-text font-weight-light">Toko Berkah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item <?php if(request()->routeIs('owner.dashboard.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.dashboard')); ?>" class=" nav-link <?php if(request()->routeIs('owner.dashboard.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('owner.laporanbeli.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.laporanbeli.index')); ?>" class="nav-link <?php if(request()->routeIs('owner.laporanbeli.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-poll-h"></i>
                        <p>
                            Laporan Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('owner.laporanjual.*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.laporanjual.index')); ?>" class="nav-link <?php if(request()->routeIs('owner.laporanjual.*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Laporan Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if(request()->routeIs('owner.owner*')): ?> menu-open <?php endif; ?>">
                    <a href="<?php echo e(route('owner.owner.index')); ?>" class="nav-link <?php if(request()->routeIs('owner.owner*')): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Daftar Owner
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/owner/layouts/sidebar.blade.php ENDPATH**/ ?>